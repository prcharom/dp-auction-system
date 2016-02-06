<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class PhotoEditFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* User ID */
		private $id_product;

		/* Photos */
		private $photos = null;


	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create($id_product = null) {

		// nacteni id nemovitosti
		$this->id_product = $id_product;

		// form
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');

		// uchovani kvuli pozdejsimu presmerovani
		$form->addText('id_product')->setValue($this->id_product);

        $this->photos = $this->database->findAll('image')->where('id_product', $this->id_product);

        $i = 0;
        $first_checkbox = null;
        $is_set_any_main_photo = false;
        // pridam tolik checkboxu kolik je fotek
        foreach($this->photos as $photo) {	
        	if ($i == 0) // ulozim si id prvniho checkboxu
        		$first_checkbox = $photo->id;
        	++$i;

        	if ($photo->order == 1) { // pokud mam v db nastavenou hlavni fotku
            	$form->addCheckbox($photo->id)->setValue(true); // nastavim checkbox zaskrtnuty
            	$is_set_any_main_photo = true; // a dam si vedet ze nastaveno jiz mam
        	} else { 
        		$form->addCheckbox($photo->id); 
        	}
        }

        // pokud uzivatel nenastavil doposud hlavni fotku
        if ($first_checkbox != null && $is_set_any_main_photo == false)
        	$form["$first_checkbox"]->setValue(true); // defaultne je brana prvni jako hlavni

		$form->addSubmit('send', 'Odeslat formulář')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {
		if ($this->photos != null) {
			$photo_manager = new Model\Photo($this->database);
			$photo_manager->setMainPhoto($values, $this->photos);
		}
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('photoEdit');
		}
	}

}
