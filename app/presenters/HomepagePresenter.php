<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Forms\ProductFormFactory;
use App\Forms\ProductDeleteFormFactory;
use App\Forms\PhotoEditFormFactory;
use App\Forms\PhotoDeleteFormFactory;


class HomepagePresenter extends BasePresenter {

		/** @var ProductFormFactory @inject */
		public $productFactory;

		/** @var ProductDeleteFormFactory @inject */
		public $productDeleteFactory;

		/** @var PhotoEditFormFactory @inject */
		public $photoEditFactory;

		/** @var PhotoDeleteFormFactory @inject */
		public $photoDeleteFactory;


	/* --- --- Default --- --- */	

	public function renderDefault($kat = null, $page = null) {

		// nastaveni paginatoru
		$this->template->paginator = new Nette\Utils\Paginator;
        $this->template->paginator->setItemsPerPage(12); // def počtu položek na stránce
        $this->template->paginator->setPage($page); // def stranky

        // selekce produktu
		$products = $this->database->findAll('product')->where('NOW() <= expire');
		if ($kat != null) { // pokud mam zadany filtr, tak filtruji produkty
			$products = $products->where('id_category', $kat);
		}
		$products = $products->order('added DESC');

		// prideleni produktu na stranku
		$this->template->paginator->setItemCount($products->count('*'));
        $this->template->products = $products->limit($this->template->paginator->getLength(), $this->template->paginator->getOffset());	
	}

	/* --- --- Category --- --- */

	public function renderCategory($id = null) {
		$this->template->auctions = $this->database->findAll('auction')->where('id_category', $id);
	}

	/* --- --- Product --- --- */

	// product detail
	public function renderProduct($id = null) {
		$this->template->product = $this->database->findById('product', $id);
		if (!$this->template->product) {
			$this->flashMessage('Produkt se nepodařilo nalézt. Je možné, že ho někdo smazal.');
			$this->redirect('Homepage:default');
		}
	}

	// product edit
	public function renderProductAddEdit($id = null) {
		$form = $this['productForm'];
		if ($id == null) {
			$form['id']->value = null;
		} else {
			$form['send']->caption = 'Upravit produkt';
			$this->template->product = $this->database->findById('product', $id);
			if ($this->template->product) {
				$form->setDefaults($this->template->product);
			} else {
				$this->flashMessage('Produkt se nepodařilo nalézt. Je možné, že ho někdo smazal.');
				$this->redirect('Homepage:default');
			}
		}
	}

	// product delete
	public function renderProductDelete($id = null) {
		$form = $this['productDeleteForm'];
		$form['send']->caption = 'Smazat produkt';
		$this->template->product = $this->database->findById('product', $id);
		if (!$this->template->product) {
			$this->flashMessage('Produkt se nepodařilo nalézt. Je možné, že ho někdo smazal.');
			$this->redirect('Homepage:default');
		}
	}

	// product photo edit
	public function renderPhotoEdit($id = null) {

		$form = $this['photoEditForm'];
        $form['send']->caption = 'Nastavit hlavní foto';

        // nactu product a overim jeho existenci 
		$this->template->product = $this->database->findById('product', $id);
        if (!$this->template->product) {
            $this->flashMessage('Tento produkt neexistuje. Je možné, že jej někdo smazal.');
            $this->redirect('Homepage:default'); 
        }

        // nactu fotky k danemu produktu
        $this->template->photos = $this->database->findAll('image')->where('id_product', $id); 

        $main_photo = false;
        // pokusim se nacist hlavni foto k dane nemovitosti
        $main_photo = $this->database->findAll('image')->where('id_product', $id)->where("order", 1)->fetch(); 
        if ($main_photo != false) { // nasel jsem ho 
        	$this->template->main_photo_id = $main_photo->id;
        } else { // nenasel jsem ho
        	$this->template->main_photo_id = 0;
        }	
	}

	// product photo delete
	public function renderPhotoDelete($id = null) {

		$form = $this['photoDeleteForm'];
        $form['send']->caption = 'Smazat fotografie';

        // nactu product a overim jeho existenci 
		$this->template->product = $this->database->findById('product', $id);
        if (!$this->template->product) {
            $this->flashMessage('Tento produkt neexistuje. Je možné, že jej někdo smazal.');
            $this->redirect('Homepage:default'); 
        }
        
        // nactu fotky k danemu produktu
        $this->template->photos = $this->database->findAll('image')->where('id_product', $id);
	}

	/* --- --- Factories --- --- */

	/**
	 * Product form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentProductForm() {		
		$form = $this->productFactory->create($this->user->id);
		$form->onSuccess[] = function ($form) {
			$values = $form->getValues();
			if ($values['id'] == null) {
				$this->flashMessage('Produkt byl úspěšně vytvořen.');
				$this->redirect('Homepage:default');
			} else {
				$this->flashMessage('Produkt byl úspěšně upraven.');
				$this->redirect('Homepage:product', $values['id']);
			}
		};
		return $form;
	}

	/**
	 * ProductDelete form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentProductDeleteForm() {
		$id = (int) $this->getParameter('id'); 		
		$form = $this->productDeleteFactory->create($id);
		$form->onSuccess[] = function ($form) {
	        $this->flashMessage('Produkt byl úspěšně smazán.');
	        $this->redirect('Homepage:default');
		};
		return $form;
	}

	/**
	 * PhotoEdit form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentPhotoEditForm() {
		$id = (int) $this->getParameter('id'); 		
		$form = $this->photoEditFactory->create($id);
		$form->onSuccess[] = function ($form) {
			$values = $form->getValues();
	        $this->flashMessage('Hlavni fotografie byla změněna.');
	        $this->redirect('Homepage:product', $values['id_product']);
		};
		return $form;
	}

	/**
	 * PhotoDelete form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentPhotoDeleteForm() {
		$id = (int) $this->getParameter('id'); 		
		$form = $this->photoDeleteFactory->create($id);
		$form->onSuccess[] = function ($form) {
			$values = $form->getValues();
	        $this->flashMessage('Vybrané fotografie byly smazány.');
	        $this->redirect('Homepage:product', $values['id_product']);
		};
		return $form;
	}

}