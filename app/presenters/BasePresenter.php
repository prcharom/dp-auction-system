<?php

namespace App\Presenters;

use Nette;
use App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {

	public function beforeRender() {
		
        $this->template->category = array('Automoto', 'Domácnost', 'Elektronika', 'Hračky', 'Nemovitosti','Oblečení', 'Potraviny', 'Ostatní');
    }
}
