<?php

namespace App\Model;

use Nette;
use Nette\Utils\Strings;
use Nette\Utils;


class Photo extends Nette\Object {

		/** @var Database */
		private $database;

		/* Error Msg */
		private $error;
  

	public function __construct(Database $database) {
		$this->database = $database;
		$this->error = null;
	}

	/**
	 * Upload profiloveho obrazku, vraci pripadnou chybu
	 * @return string
	 */
	public function uploadProfileImage($img, $id_user) { 
		$user = $this->database->findById('user', $id_user);
		if($user) {       
		    if ($img->isOk() && $img->isImage()) {

		        $typ_explode = explode('.', $img->getName());
		        $typ = end($typ_explode);

		        // uprava jmena
		        $values['photo'] = $this->generateHash($user->nick) . '.' . $typ;
		        
		        // uprava velikosti 
		        $img_tmp = Nette\Utils\Image::fromFile($img);
	            if ($img_tmp->width > 240) {
		            $img_tmp->resize(240, null); // w = 240px, h = auto
		        	$img_tmp->sharpen(); // doostreni obrazku
		        }

		        // poslani fota na server
		        chmod(WWW_DIR . '/images/profiles/', 0777 );  // nastaveni atributu
		        $img_tmp->save(WWW_DIR . '/images/profiles/' . $values['photo']);
		        //$img->move(WWW_DIR . "/images/profiles/" . $values['photo']);

		        // ulozeni obrazku v db
		        $user->update($values);
		    } else {
		    	$this->error = 'Nastal problém s nahráváním obrázku.';
		    }
		} else {
			$this->error = 'Uživatel, kterého se snažíte upravit, neexistuje. Je možné, že ho někdo smazal.';
		}
	    return $this->error;
	}

	/**
	 * Generuje hash nazvu
	 * @return string
	 */
	public function generateHash($src) {	
		return crypt($src);
	}

}
