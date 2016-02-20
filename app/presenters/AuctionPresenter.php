<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Forms\BidFormFactory;


class AuctionPresenter extends BasePresenter {

		/** @var BidFormFactory @inject */
		public $bidFactory;


	// auction
	public function renderBid($id = null) {
		$form = $this['bidForm'];
		$this->template->now = date('Y-m-d H:i:s');
		$this->template->product = $this->database->findById('product', $id);
		if (!$this->template->product) {
			$this->flashMessage('Produkt se nepodařilo nalézt. Je možné, že ho někdo smazal.');
			$this->redirect('Homepage:default');
		}
		if ($this->template->product->id_type_auction == 1) {
			$form['send']->caption = 'Koupit'; 
		} else {
			$form['send']->caption = 'Navýšit';
		}
	}


	/* --- --- Factories --- --- */


	/**
	 * Bid form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentBidForm() {
		$id_product = (int) $this->getParameter('id'); 		
		$form = $this->bidFactory->create($id_product, $this->user->id);
		return $form;
	}

}