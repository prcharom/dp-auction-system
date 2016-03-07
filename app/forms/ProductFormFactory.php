<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class ProductFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* User ID */
		private $id_user;


	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create($id_user = null) {
		// predani id uzivatele
		$this->id_user = $id_user;
		// form
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');
		$form->addText('id');

		$form->addText('name', 'Název:')
			->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
			->setRequired('Prosím vyplňte pole Název.');

		$cat = $this->database->arrayColumn('category', 'name');
		$form->addSelect('id_category', 'Kategorie:', $cat)
      		->setAttribute('class', 'form-control')
      		->setRequired('Prosím vyberte kategorii.');

      	$form->addUpload('img', 'Fotografie:', TRUE)
        	->addRule(Nette\Application\UI\Form::IMAGE, 'Fotografie musí být JPEG, PNG nebo GIF.')
        	->addRule(Nette\Application\UI\Form::MAX_FILE_SIZE, 'Maximální velikost fotografie je 2 MB.', 2 * 1024 * 1024 /* v bytech */);

		$form->addTextArea('description', 'Popis:')
			->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
			->setRequired('Prosím vyplňte pole Popis.');

		$auct_type = $this->database->arrayColumn('type_auction', 'name');
		$form->addSelect('id_type_auction', 'Typ aukce:', $auct_type)
      		->setAttribute('class', 'form-control')
      		->setRequired('Prosím vyberte kategorii.');

      	$auct_duration = $this->database->arrayColumn('duration_auction', 'name');
		$form->addSelect('id_duration_auction', 'Doba trvání aukce:', $auct_duration)
      		->setAttribute('class', 'form-control')
      		->setRequired('Prosím vyberte kategorii.');

		$form->addText('cost', 'Cena:')
			->setType('number')
			->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
			->setRequired('Prosím vyplňte pole Cena.')
			->addRule(Form::RANGE, 'Cena musí být vyšší nebo rovna 0.', array(0, null));

		$form->addText('min_bid', 'Minimální přihazovaná částka:')
			->setType('number')
			->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno');

		$form->addSubmit('send', 'Přidat aukci')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {

		// pro odchytavani chyb
		$error = null;

		// ostatni akce 
		$product = new Model\Product($this->database); 
		$values['id_user'] = $this->id_user;
		$imgs = $values['img'];
		unset($values['img']);

		// add / edit
		if ($values['id'] == null) { // add
			$p = $product->add($values);
			$product_id = $p->id;
			$form->getPresenter()->flashMessage('Produkt byl úspěšně vytvořen.');
		} else { // edit
			$error = $product->update($values, $values['id']); 
			$product_id = $values['id'];
			$form->getPresenter()->flashMessage('Produkt byl úspěšně upraven.');
		}

		if ($error == null) {
			// nahrani fotek k produktu
			if ($imgs != null) {
				$photo_manager = new Model\Photo($this->database);
				$photo_manager->uploadProductPhotos($imgs, $product_id);
			}
			// presmerovani
			$form->getPresenter()->redirect('Homepage:product', $product_id);
		} else {
			$form->addError($error);
		}			
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('product');
		}
	}

}
