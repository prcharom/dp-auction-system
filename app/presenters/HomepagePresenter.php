<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Forms\SignFormFactory;


class HomepagePresenter extends BasePresenter {

	/** @var string */
    private $anyVariable;


    public function handleChangeVariable()
    {
        $this->anyVariable = $this->database->findById('user', 1)->name;
        if ($this->isAjax()) {
            $this->redrawControl('ajaxChange');
        }
    }

	/* --- --- Default --- --- */	
	public function renderDefault() {
		$objProduct = new Model\Product; 
		$this->template->products = $objProduct->getProducts();
		if ($this->anyVariable === NULL) {
            $this->anyVariable = 'default value';
        }
        $this->template->anyVariable = $this->anyVariable;
		
	}

	/* --- --- Category --- --- */
	public function renderCategory($id=null) {
		$this->template->auctions = $this->database->findAll('auction')->where('id_category', $id);
	}

	/* --- --- Product --- --- */
	public function renderProduct($id=null) {
		$objProduct = new Model\Product; 
		$this->template->products = $objProduct->getProducts();
		$this->template->id = $id-1;	
	}

}
