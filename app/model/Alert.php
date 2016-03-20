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

	// inaktivovani vybranych upozorneni
	public function inactivate($values, $alerts) {
		foreach($alerts as $a) {
            if($values["$a->id"] == true) {
            	$arr['visited'] = 1;
                $a->update($arr); // updatuji alert jako precteny
            }
        }
	}

	// aktivovani vybranych upozorneni
	public function activate($values, $alerts) {
		foreach($alerts as $a) {
            if($values["$a->id"] == true) {
            	$arr['visited'] = 0;
                $a->update($arr); // updatuji alert jako neprecteny
            }
        }
	}

	// mazani vybranych upozorneni
	public function delete($values, $alerts) {
		foreach($alerts as $a) {
            if($values["$a->id"] == true) {
                $a->delete(); // smazu alert
            }
        }
	}

	// vyrozumneni o probehle aukci
	public function endOfAuction($product) {

		// priprava na posilani emailu
		$email_manager = new Model\Email($this->database); 

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
		$row = $this->database->insert('alert', $val);
		// a poslani emailu vitezi aukce
		$email_manager->sendEmail($winners_bid->user->email, 'end_auction_winner', $product, $winners_bid, $cost, $row->type_alert->name);


		/* --- vyrozumneni pro zbyle ucastniky aukce --- */
		$bids = $this->database->findAll('bid')->where('id_product', $product->id)->group('id_user');
		foreach ($bids as $bid) {
			if ($bid->id_user != $winners_bid->id_user) { // vitez aukce uz informovan byl
				// uprava alertu
				$val['id_user'] = $bid->id_user;
				$val['body'] = 'Aukci produktu '.$product->name.' (id '.$product->id.'), do které jste zasáhli, vyhrál jiný účastník.';
				// vlozeni do db
				$row = $this->database->insert('alert', $val);
				// a poslani emailu porazenym
				$email_manager->sendEmail($bid->user->email, 'end_auction_others', $product, $bid, $cost, $row->type_alert->name);
			}
		}

		/* --- vyrozumneni pro zadavatele aukce --- */
		$val['id_user'] = $product->id_user;
		$val['body'] = 'Aukce produktu '.$product->name.' (id '.$product->id.') je u konce. Výherce aukce je '.$winners_bid->user->name.
		' (tel: '.$winners_bid->user->phone.', email: '.$winners_bid->user->email.'), který produkt koupil za '.number_format($cost).' Kč.';
		// vlozeni do db
		$row = $this->database->insert('alert', $val);
		// a poslani emailu zadavateli
		$email_manager->sendEmail($product->user->email, 'end_auction_seller', $product, $winners_bid, $cost, $row->type_alert->name);
	}

	// upozorneni po prihozeni
	public function newBid($product) {

	}

} 