<?php

namespace App\Model;

use Nette;
use App\Model;

class Product extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Actual DateTime - DB Format */
		private $now;

		/* Error */
		private $error = null;

	public function __construct(Model\Database $database) {
		$this->database = $database;
		$this->now = date('Y-m-d H:i:s');
	} // eof construct

	public function add($values) {
		$values['added'] = $this->now;
		// potreba zjistit na kolik dni ma byt aukce spustena
		$duration = $this->database->findById('duration_auction', $values['id_duration_auction']);
		$values['expire'] = date('Y-m-d H', strtotime($this->now.' + '.$duration->duration_days.' day'));
		return $this->database->findAll('product')->insert($values);
	} // eof add

	public function update($values, $id) {
		$product = $this->database->findById('product', $id);
		if ($product) { // pokud existuje produkt
			if ($product->related('bid.id_product')->count() <= 0) { // a jeste k nemu nikdo neprihodil
				// pak jeste umozni zmenu nastaveni
				$duration = $this->database->findById('duration_auction', $values['id_duration_auction']); 		
				$duration_diff = $duration->duration_days - $product->duration_auction->duration_days;
				if ($duration_diff >= 0) { // stejny nebo prodluzuji cas
					$values['expire'] = date('Y-m-d H', strtotime($product->expire.' + '.$duration_diff.' day'));
				} else { // kratim cas
					$duration_diff = -1*$duration_diff;
					$values['expire'] = date('Y-m-d H', strtotime($product->expire.' - '.$duration_diff.' day')); 
				} 
				$product->update($values);
			} else {
				$this->error = 'Produkt nelze upravovat. O produkt již nějaký uživatel projevil zájem.';
			} 
		} else {
			$this->error = 'Produkt nebyl nalezen. Pravděpodobně jej někdo smazal.';
		}
		return $this->error;
	} // eof update

} // eof class