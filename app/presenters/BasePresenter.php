<?php

namespace App\Presenters;

use Nette;
use App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {

		/** @var Model\Database */
		protected $database;


	public function __construct(Model\Database $database) {
		$this->database = $database;
	}


	public function beforeRender() {
		
		/* --- --- promenne --- --- */
		$this->template->systemName = $this->database->findAll('setings')->where('id_parameter', 1)->fetch();
        $this->template->categories = $this->database->findAll('category');
        $this->template->alerts = $this->database->findAll('alert')->where('id_user', $this->user->id)->where('visited', 0)->order('added DESC')->order('id DESC');
        $this->template->id_category = (int) $this->getParameter('kat'); 

        /* --- --- vlastni helpery --- --- */

        // filtr na tvorbu "hezkeho" datumu
        $this->template->addFilter('mydate', function ($date) {
        	if ($date >= date( 'Y-m-d', strtotime('today')))
        		return 'Dnes';
        	elseif ($date >= date('Y-m-d', strtotime('yesterday'))) {
        		return 'Včera';
        	} else {
        		$months = array(1 => 'leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec');
        		return date('j', strtotime($date)).'. '.$months[date('n', strtotime($date))];
        	}
        });

    }
}
