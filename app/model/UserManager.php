<?php

namespace App\Model;

use Nette,
	Nette\Security,
	Nette\Utils\Strings;


class UserManager {

    	/** @var Nette\Security\User */
    	private $user;

    	/** @var Nette\Database\Context */
		private $database;

		// ostatni parametry
		private $table;
		private $user_salt;
		private $now;


    public function __construct(Nette\Security\User $user, Nette\Database\Context $database) {

        $this->user = $user;
        $this->database = $database;
       	$this->table = 'user';
		$this->user_salt = '$2a$07$';
        $this->now = date('Y-m-d H:i:s');
    }


    // fce pro rychlejsi vyhledavani tabulky user
    public function findTable() {

    	return $this->database->table($this->table);
  	}


  	// fce pro autentikaci uzivatelu
	public function login($nick, $password) {
	    
		$row = $this->findTable()->where('nick', $nick)->fetch();

		$err_msg = 'Zadali jste špatné heslo a nebo zadaný uživatel neexistuje. Ujistěte se, že máte správně vyplněné přihlašovací údaje a akci opakujte.';

		if (!$row) {
			throw new Security\AuthenticationException($err_msg);
		}

		if ($row->password !== $this->generateHash($password, $row->password)) {
			throw new Security\AuthenticationException($err_msg);
		}

		$arr = $row->toArray();
		unset($arr['password']);

		// uprava data posledniho prihlaseni
		$update_array['last_login'] = $this->now;
		$row->update($update_array);

		// aktualizace data pro session
		$arr['last_login'] = $update_array['last_login'];

		// prihlaseni uzivatele
	    $this->user->login(new Security\Identity($row->id, $row->role->name, $arr));
	}


	// metoda pro registraci
	public function register($data) {  

	    unset($data['password2']);
	    $data['password'] = $this->generateHash($data['password']);
	    $data['registered_since'] = $this->now;
	    $data['id_role'] = 2;
	    return $this->findTable()->insert($data);
	}


	// fce pro zmenu hesla
	public function changePassword($id, $password) {
		$user = $this->findTable()->get($id);
		$data['password'] = $this->generateHash($password);
		return $user->insert($data);
	}


	/**
	 * Generuje hash hesla i se solicim retezcem
	 * @return string
	 */
	public function generateHash($password, $salt = NULL) {
		
		if ($password === Strings::upper($password)) { // v pripade zapleho capslocku
			$password = Strings::lower($password);
		}
		
		return crypt($password, $salt ?: $this->user_salt . Strings::random(23));
	}

}