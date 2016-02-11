<?php

namespace App\Model;

use Nette;
use App\Model;

class Auction extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Actual DateTime - DB Format */
		private $now;

		/* Error */
		private $error = null;

	public function __construct(Model\Database $database) {
		$this->database = $database;
		$this->now = date('Y-m-d H:i:s');
	} 

	public function bidBuyNow($product, $id_user) { // aukce "kup hned"
		if($product->related('bid.id_product')->count() > 0) {
			$this->error = 'Je nám líto, ale produkt byl již prodán.';
		} else {
			// uprava prihozu
			$values['id_product'] = $product->id;
			$values['id_user'] = $id_user;
			$values['added'] = $this->now;
			$values['deposit'] = 0; // neprihazuji nic, pocatecni cena se nemeni
			$this->database->findAll('bid')->insert($values);
			// uprava produktu
			$val['expire'] = $this->now;
			$product->update($val);
		}
		return $this->error;
	} 

} 