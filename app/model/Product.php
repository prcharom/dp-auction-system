<?php

namespace App\Model;

use Nette;
use App\Model;

class Product extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Actual DateTime - DB Format */
		private $now;

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
		return $this->database->findById('product', $id)->update($values);
	} // eof update

} // eof class