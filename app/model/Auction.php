<?php

namespace App\Model;

use Nette;
use App\Model;

class Auction extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Actual DateTime - DB Format */
		private $now;

	public function __construct(Model\Database $database) {
		$this->database = $database;
		$this->now = date('Y-m-d H:i:s');
	} // eof construct

	public function bidBuyNow($product) {
		
	} // eof add

} // eof class