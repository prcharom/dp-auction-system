<?php

namespace App\Model;

use Nette;
use App\Model;

class Email extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Mailer */
		private $mailer;

		/* Error */
		private $error = null;

		/* Actual DateTime - DB Format */
		private $now;

	public function __construct(Model\Database $database) {

		// nastaveni attr
		$this->database = $database;
		$this->now = date('Y-m-d H:i:s');

		// nastaveni emailu, ktery bude maily posilat
		$this->mailer = array(
                        'host' => 'smtp.seznam.cz',
                        'username' => 'zdrhal@email.cz',
                        'password' => 'theu036',
                        'secure' => 'ssl',
                );
	} 

	public function sendEmail($email = null) {

		if($email != null || $email != "") {
            // nastaveni parametru pro latte emailu
            $latte = new Nette\Latte\Engine;
            $params = array(
                'par1' => $par1, // pripravit parametry pro latte
            );

            // nastaveni mailu
            $mail = new Nette\Mail\Message;
            $mail->setFrom($this->mailer->username)
            ->addTo($email)
            ->setHtmlBody($latte->renderToString(__DIR__ . '/../presenters/templates/Email/email.latte', $params));

            // poslani mailu
           	$mailer = new Nette\Mail\SmtpMailer($this->mailer);
            $mailer->send($mail);
        }
	}

} 