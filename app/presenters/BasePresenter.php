<?php

namespace App\Presenters;

use Nette;
use App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {

		/** @var Model\Database */
		private $database;


	public function __construct(Model\Database $database) {
		$this->database = $database;
	}


	public function beforeRender() {
		
		$this->template->systemName = $this->database->findAll('setings')->where('id_parameter', 1)->fetch();
        $this->template->categories = $this->database->findAll('setings')->where('id_parameter', 2);
    }
}
