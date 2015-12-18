<?php

namespace App\Model;

use Nette;
use Nette\Utils\Strings;
use Nette\Utils;


class Photo extends Nette\Object {

		/** @var Database */
		private $database;

		/* Ostatni Promenne */
		private $error;		// chyba
		private $name;		// nazev obrazku
		private $extension;	// koncovka obrazku
  

	public function __construct(Database $database) {
		$this->database = $database;
		$this->error = null;
	}

	// funkce, ktera pripravi obrazek pro upload
	public function prepareImageForUpload($img) {
		if ($img->isOk() && $img->isImage()) {
			
			$ext_explode = explode('.', $img->getName());
		    $this->extension = end($ext_explode);

		    $this->name = Nette\Utils\Strings::random(60);

		    return array('name' => $this->name, 'extension' => $this->extension);
		} else {
		  	$this->error = 'Nastal problém s nahráváním obrázku.';
		}
	}

	// upload profiloveho obrazku, vraci pripadnou chybu
	public function uploadProfileImage($img, $id_user) { 
		$user = $this->database->findById('user', $id_user);
		if($user) { 
			// pripraveny obrazek dale zpracuji
			$image = $this->prepareImageForUpload($img);
			if($user->photo == null) {
				$values['photo'] = $image['name'] . '.' . $image['extension'];
			    // ulozeni obrazku v db
			    $user->update($values);
			} else {
				$values['photo'] = $user->photo;
			}

			// uprava velikosti 
		    $img_tmp = Nette\Utils\Image::fromFile($img);
	        if ($img_tmp->width > 240) {
		        $img_tmp->resize(240, null); // w = 240px, h = auto
		       	$img_tmp->sharpen(); // doostreni obrazku
		    }

		    // poslani fota na server
		    chmod(WWW_DIR . '/images/profiles/', 0777 );  // nastaveni atributu
		    $img_tmp->save(WWW_DIR . '/images/profiles/' . $id_user . '_' . $values['photo']);
		    //$img->move(WWW_DIR . "/images/profiles/" . $values['photo']);

		} else {
			$this->error = 'Uživatel, kterého se snažíte upravit, neexistuje. Je možné, že ho někdo smazal.';
		}
	    return $this->error;
	}

}
