<?php

namespace App\Model;

use Nette;
use Latte;
use App\Model;

class Email extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Mailer */
		private $mailer;

	public function __construct(Model\Database $database) {

		// nastaveni attr
		$this->database = $database;

		// nastaveni emailu, ktery bude maily posilat
		$this->mailer = array(
                        'host' => 'smtp.seznam.cz',
                        'username' => 'zdrhal@email.cz',
                        'password' => 'theu036',
                        'secure' => 'ssl',
                );
	} 

	public function sendEmail($email = null, $latte_name, $product, $winners_bid, $cost, $title) {

		if($email != null || $email != "") {
            // nastaveni parametru pro latte emailu
            $latte = new Latte\Engine;
            $params = array(
                'product' => $product,
                'winners_bid' => $winners_bid,
                'cost' => $cost,
                'title' => $title,
            );

            // nastaveni mailu
            $mail = new Nette\Mail\Message;
            $mail->setFrom($this->mailer['username'])
            ->addTo($email)
            ->setHtmlBody($latte->renderToString(__DIR__ . '/../presenters/templates/Email/'.$latte_name.'.latte', $params));

            // poslani mailu
           	$mailer = new Nette\Mail\SmtpMailer($this->mailer);
            $mailer->send($mail);
        }
	}

} 