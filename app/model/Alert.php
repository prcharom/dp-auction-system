<?php

namespace App\Model;

use Nette;
use App\Model;

class Alert extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Actual DateTime - DB Format */
		private $now;

	public function __construct(Model\Database $database) {
		$this->database = $database;
		$this->now = date('Y-m-d H:i:s');
	} 

	// vyrozumneni o probehle aukci
	public function endOfAuction($product) {

		// celkova cena 
		$cost = $product->cost + $product->related('bid.id_product')->sum('deposit');

		/* --- vyrozumneni pro vyherce aukce --- */
		$winners_bid = $this->database->findAll('bid')->where('id_product', $product->id)->order('id DESC')->fetch();
		// priprava alertu pro viteze aukce
		$val['id_user'] = $winners_bid->id_user;
		$val['id_type_alert'] = 1;
		$val['added'] = $this->now;
		$val['visited'] = 0;
		$val['body'] = 'Vyhráli jste aukci produktu '.$product->name.' (id '.$product->id.'). Cena produktu činí '.number_format($cost).' Kč. Pro další informace k předání produktu kontaktujte '.
		$product->user->name.' (tel: '.$product->user->phone.', email: '.$product->user->email.').';
		// vlozeni alertu pro viteze do db
		$this->database->insert('alert', $val);

		/* --- vyrozumneni pro zbyle ucastniky aukce --- */
		$bids = $this->database->findAll('bid')->where('id_product', $product->id)->group('id_user');
		foreach ($bids as $bid) {
			if ($bid->id_user != $winners_bid->id_user) { // vitez aukce uz informovan byl
				// uprava alertu
				$val['id_user'] = $bid->id_user;
				$val['body'] = 'Aukce produktu '.$product->name.' (id '.$product->id.'), do které jste zasáhli, je u konce. Aukci vyhrál jiný účastník.';
				// vlozeni do db
				$this->database->insert('alert', $val);
			}
		}

		/* --- vyrozumneni pro zadavatele aukce --- */
		$val['id_user'] = $product->id_user;
		$val['body'] = 'Aukce produktu '.$product->name.' (id '.$product->id.') je u konce. Výherce aukce je '.$winners_bid->user->name.
		' (tel: '.$winners_bid->user->phone.', email: '.$winners_bid->user->email.'), který produkt koupil za '.number_format($cost).' Kč.';
		$this->database->insert('alert', $val);
	}

} 