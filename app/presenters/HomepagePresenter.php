<?php

namespace App\Presenters;

use Nette;
use App\Model;


class HomepagePresenter extends BasePresenter {

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
