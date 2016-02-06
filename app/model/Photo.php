<?php

namespace App\Model;

use Nette;
use Nette\Utils\Strings;
use Nette\Utils;


class Photo extends Nette\Object {

		/** @var Database */
		private $database;

		/* Ostatni Promenne */
		private $error;			// chyba
		private $name;			// nazev obrazku
		private $extension;		// koncovka obrazku
		private $now;			// aktualni cas a datum
		private $root_img_dir;	// korenovy adresar obrazku
  

	public function __construct(Database $database) 
	{
		$this->database = $database;
		$this->error = null;
		$this->now = date('Y-m-d H:i:s');
		$this->root_img_dir = WWW_DIR . '/images/';
	}

	// funkce, ktera pripravi obrazek pro upload
	public function prepareImageForUpload($img) 
	{
		if ($img->isOk() && $img->isImage()) {
			
			$ext_explode = explode('.', $img->getName());
		    $this->extension = end($ext_explode);

		    $this->name = $this->generateHash();

		    return array('name' => $this->name, 'extension' => $this->extension);
		} else {
		  	$this->error = 'Nastal problém s nahráváním obrázku.';
		}
	}

	// upload profiloveho obrazku, vraci pripadnou chybu
	public function uploadProfileImage($img, $id_user) 
	{ 
		$user = $this->database->findById('user', $id_user);
		if($user) { 
			$image = $this->prepareImageForUpload($img);
			if($user->photo != null) {
				// odmazu stare foto
				unlink($this->root_img_dir . 'profiles/' . $id_user . '_' . $user->photo);
			}
			$values['photo'] = $image['name'] . '.' . $image['extension'];
			$user->update($values);

			// uprava velikosti 
		    $img_tmp = Nette\Utils\Image::fromFile($img);
	        if ($img_tmp->width > 240) {
		        $img_tmp->resize(240, null); // w = 240px, h = auto
		       	$img_tmp->sharpen(); // doostreni obrazku
		    }

		    // poslani fota na server
		    chmod($this->root_img_dir . 'profiles/', 0777);  // nastaveni atributu
		    $img_tmp->save($this->root_img_dir . 'profiles/' . $id_user . '_' . $values['photo']);
		    //$img->move(WWW_DIR . "/images/profiles/" . $values['photo']);

		} else {
			$this->error = 'Uživatel, kterého se snažíte upravit, neexistuje. Je možné, že ho někdo smazal.';
		}
	    return $this->error;
	}

	// upload obrazku k aukci
	public function uploadProductPhotos($images, $id_product)
	{
		$product = $this->database->findById('product', $id_product);
		if($product) {
			// projedu vsechny fotografie
			foreach($images as $img) {

				// priprava pro vlozeni do db
				$image = $this->prepareImageForUpload($img);
				$values['name'] = $this->generateHash();
				$values['extension'] = $image['extension'];
				$values['id_product'] = $product->id;
				$values['added'] = $this->now;

				// upravy obrazku, zmena velikosti a dostreni
				$img_tmp = Nette\Utils\Image::fromFile($img);
                if ($img_tmp->width > 800)
	               $img_tmp->resize(800, null); // w = 800px, h = auto
	            $img_tmp->sharpen(); // doostreni obrazku

	            // vlozeni fotografie do db
	            $row = $this->database->insert('image', $values);

	            // upload fotografie na server
	            $img->move($this->root_img_dir . 'products/' . $product->id . '_' . $row->id . '_' . $values['name'] . '.' . $values['extension']);
			}
		}
	}

	// vyber hlavni fotografie
	public function setMainPhoto($values, $photos) 
	{
		$selected_main_photo = null; // nova hlavni fotka
        $prev_main_photo = null; // stara hlavni fotka

        // projdu vsechny fotky k dane udalosti
        foreach($photos as $photo) {
        	// najdu predchozi hlavni 
        	if($photo->order == 1) {
            	$prev_main_photo = $photo->id;
            }

          	// najdu novou hlavni
            if($values["$photo->id"] == true) {
            	$selected_main_photo = $photo->id;
            }
        }

        // uprava stare hlavni fotky
        if ($prev_main_photo != null) { // pokud vubec mame nejakou vybranou starou fotku
        	$photo = $this->database->findById('image', $prev_main_photo);
        	if ($photo) { // pokud ji tedy mam v db
        		// tak ji odoznacime jako hlavni fotku
        		$val['order'] = 0;
        		$photo->update($val);
        	}
        }

        // uprava nove hlavni fotky
        if ($selected_main_photo != null) { // pokud vubec mame nejakou vybranou novou fotku
        	$photo = $this->database->findById('image', $selected_main_photo);
        	if ($photo) { // pokud ji tedy mam v db
        		// tak ji oznacime jako hlavni fotku
        		$val['order'] = 1;
        		$photo->update($val);
        	}
        }
	}

	// mazani fotografii
	public function deletePhotos($values, $photos) 
	{
		foreach($photos as $p) {
            if($values["$p->id"] == true) {
                unlink($this->root_img_dir . 'products/' . $p->id_product . '_' . $p->id . '_' . $p->name . '.' . $p->extension); // smazu ve slozce
                $p->delete(); // smazu v db
            }
        }
	}

	// moje hashovaci fce
	public function generateHash() 
	{	
		return Strings::random(60);
	}

}