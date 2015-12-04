<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Forms\SignFormFactory;


class HomepagePresenter extends BasePresenter {

	/* --- --- Render functions --- --- */	

	public function renderDefault() {
		$objProduct = new Model\Product; 
		$this->template->products = $objProduct->getProducts();
		
	}

	public function renderProduct($id=null) {
		$objProduct = new Model\Product; 
		$this->template->products = $objProduct->getProducts();
		$this->template->id = $id-1;	
	}

}
