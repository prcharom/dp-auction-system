<?php

namespace App\Model;

use Nette;



class Product extends Nette\Object {
	
		private $title = array('Fitness tílko', 'Škoda Octavia', 'Burger EL Mňamoso');
		private $prize = array(250, 650000, 95);
		private $body = array(
			'Nové triko, které se hodí na jakékoliv fitness aktivity. Triko se přizpůsobí vašemu tělu a skvěle saje pot.',
			'Jedná se o moderní automobil vyrobený v Mladé Boleslavi. Tato nová Škoda Octavia má samé klady. Škodováci si určitě zamilují novou poloautomatickou spojku, kterou se automobilka rozhodla nově zařadit do sériové výroby tohoto vozu. Toto vozítko vás prostě dostane, ne náhodou se řadí k největším aspirantům na titul auto roku 2015. ',
			'Patříte-li k lidem, kteří si rádi vychutnají pořádného burgra, tak rozhodně neváhejte a ochutnejte našeho Burgera El Mňamoso, který je bezesporu králem mezi burgery!'
			);
		private $photo = array('252552.jpg', '213131.jpg', '759583.jpg');
		private $reviews = array(12, 15, 6);
		private $stars = array(3, 5, 4);
		private $products;


	public function __construct() {

		$this->products = array(
			'title' => $this->title,
			'prize' => $this->prize,
			'body' => $this->body,
			'photo' => $this->photo,
			'reviews' => $this->reviews,
			'stars' => $this->stars
		);

	} // eof construct

	public function getProducts() {
		return $this->products;
	} // eof getProducts

} // eof class