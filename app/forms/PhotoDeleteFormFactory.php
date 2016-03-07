<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class PhotoDeleteFormFactory extends Nette\Object {

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

        foreach($this->photos as $photo) {
            $form->addCheckbox($photo->id); 
        }

		$form->addSubmit('send', 'Odeslat formulář')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {
		$product = $this->database->findById('product', $this->id_product);
		if ($product) {
			if ($product->related('bid.id_product')->count() <= 0) {
				if ($this->photos != null) {
					$photo_manager = new Model\Photo($this->database);
					$photo_manager->deleteProductPhotos($values, $this->photos);
					// presmerovani
					$form->getPresenter()->flashMessage('Vybrané fotografie byly smazány.');
	        		$form->getPresenter()->redirect('Homepage:product', $this->id_product);
				}
			} else {
				$form->addError('Fotografie nelze smazat. O produkt již nějaký uživatel projevil zájem.');
			}
		} else {
			$form->addError('Produkt nebyl nalezen. Pravděpodobně jej někdo smazal.');
		}
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('photoDelete');
		}
	}

}
