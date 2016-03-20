<?php

namespace App\Model;

use Nette;
use App\Model;

class Category extends Nette\Object {

		/** @var Model\Database */
		private $database;


	public function __construct(Model\Database $database) {
		$this->database = $database;
	} 

	// pridani nove kategorie
	public function add($values) {
		$this->database->insert('category', $values);
	}

	// uprava stavajici kategorie
	public function edit($values, $category) {
		$category->update($values);
	}

	// mazani vybrane kategorie
	public function delete($category) {
		$category->delete();
	}

	// mazani vybranych
	public function deleteGroup($values, $categories) {
		foreach($categories as $c) {
            if($values["$c->id"] == true) {
                $c->delete(); // smazu kategorii
            }
        }
	}

} 