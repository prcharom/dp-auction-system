<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app/config/config.neon 
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app/config/config.local.neon 

class Container_57160c6847 extends Nette\DI\Container
{
	protected $meta = array(
		'types' => array(
			'Nette\Object' => array(
				array(
					'application.application',
					'application.linkGenerator',
					'database.default.connection',
					'database.default.structure',
					'database.default.context',
					'http.requestFactory',
					'http.request',
					'http.response',
					'http.context',
					'security.user',
					'session.session',
					'25_App_Forms_AdminCategoryFormFactory',
					'26_App_Forms_AdminDeleteCategoryFormFactory',
					'27_App_Forms_AdminDeleteDurationFormFactory',
					'28_App_Forms_AdminDurationFormFactory',
					'29_App_Forms_AlertFormFactory',
					'30_App_Forms_BidFormFactory',
					'31_App_Forms_PasswordFormFactory',
					'32_App_Forms_PhotoDeleteFormFactory',
					'33_App_Forms_PhotoEditFormFactory',
					'34_App_Forms_ProductDeleteFormFactory',
					'35_App_Forms_ProductFormFactory',
					'36_App_Forms_SignFormFactory',
					'37_App_Forms_UploadProfilePhotoFormFactory',
					'38_App_Forms_UserFormFactory',
					'39_App_Model_Auction',
					'40_App_Model_Database',
					'41_App_Model_Photo',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'container',
				),
			),
			'Nette\Application\Application' => array(1 => array('application.application')),
			'Nette\Application\IPresenterFactory' => array(
				1 => array('application.presenterFactory'),
			),
			'Nette\Application\LinkGenerator' => array(1 => array('application.linkGenerator')),
			'Nette\Caching\Storages\IJournal' => array(1 => array('cache.journal')),
			'Nette\Caching\IStorage' => array(1 => array('cache.storage')),
			'Nette\Database\Connection' => array(
				1 => array('database.default.connection'),
			),
			'Nette\Database\IStructure' => array(
				1 => array('database.default.structure'),
			),
			'Nette\Database\Structure' => array(
				1 => array('database.default.structure'),
			),
			'Nette\Database\IConventions' => array(
				1 => array('database.default.conventions'),
			),
			'Nette\Database\Conventions\DiscoveredConventions' => array(
				1 => array('database.default.conventions'),
			),
			'Nette\Database\Context' => array(1 => array('database.default.context')),
			'Nette\Http\RequestFactory' => array(1 => array('http.requestFactory')),
			'Nette\Http\IRequest' => array(1 => array('http.request')),
			'Nette\Http\Request' => array(1 => array('http.request')),
			'Nette\Http\IResponse' => array(1 => array('http.response')),
			'Nette\Http\Response' => array(1 => array('http.response')),
			'Nette\Http\Context' => array(1 => array('http.context')),
			'Nette\Bridges\ApplicationLatte\ILatteFactory' => array(1 => array('latte.latteFactory')),
			'Nette\Application\UI\ITemplateFactory' => array(1 => array('latte.templateFactory')),
			'Latte\Object' => array(array('nette.latte')),
			'Latte\Engine' => array(array('nette.latte')),
			'Nette\Mail\IMailer' => array(1 => array('mail.mailer')),
			'Nette\Application\IRouter' => array(1 => array('routing.router')),
			'Nette\Security\IUserStorage' => array(1 => array('security.userStorage')),
			'Nette\Security\User' => array(1 => array('security.user')),
			'Nette\Http\Session' => array(1 => array('session.session')),
			'Tracy\ILogger' => array(1 => array('tracy.logger')),
			'Tracy\BlueScreen' => array(1 => array('tracy.blueScreen')),
			'Tracy\Bar' => array(1 => array('tracy.bar')),
			'App\Forms\AdminCategoryFormFactory' => array(
				1 => array('25_App_Forms_AdminCategoryFormFactory'),
			),
			'App\Forms\AdminDeleteCategoryFormFactory' => array(
				1 => array(
					'26_App_Forms_AdminDeleteCategoryFormFactory',
				),
			),
			'App\Forms\AdminDeleteDurationFormFactory' => array(
				1 => array(
					'27_App_Forms_AdminDeleteDurationFormFactory',
				),
			),
			'App\Forms\AdminDurationFormFactory' => array(
				1 => array('28_App_Forms_AdminDurationFormFactory'),
			),
			'App\Forms\AlertFormFactory' => array(
				1 => array('29_App_Forms_AlertFormFactory'),
			),
			'App\Forms\BidFormFactory' => array(
				1 => array('30_App_Forms_BidFormFactory'),
			),
			'App\Forms\PasswordFormFactory' => array(
				1 => array('31_App_Forms_PasswordFormFactory'),
			),
			'App\Forms\PhotoDeleteFormFactory' => array(
				1 => array('32_App_Forms_PhotoDeleteFormFactory'),
			),
			'App\Forms\PhotoEditFormFactory' => array(
				1 => array('33_App_Forms_PhotoEditFormFactory'),
			),
			'App\Forms\ProductDeleteFormFactory' => array(
				1 => array('34_App_Forms_ProductDeleteFormFactory'),
			),
			'App\Forms\ProductFormFactory' => array(
				1 => array('35_App_Forms_ProductFormFactory'),
			),
			'App\Forms\SignFormFactory' => array(
				1 => array('36_App_Forms_SignFormFactory'),
			),
			'App\Forms\UploadProfilePhotoFormFactory' => array(
				1 => array(
					'37_App_Forms_UploadProfilePhotoFormFactory',
				),
			),
			'App\Forms\UserFormFactory' => array(
				1 => array('38_App_Forms_UserFormFactory'),
			),
			'App\Model\Auction' => array(1 => array('39_App_Model_Auction')),
			'App\Model\Database' => array(1 => array('40_App_Model_Database')),
			'App\Model\Photo' => array(1 => array('41_App_Model_Photo')),
			'App\Presenters\BasePresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\Application\UI\Presenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\Application\UI\Control' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\Application\UI\PresenterComponent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\ComponentModel\Container' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\ComponentModel\Component' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\Application\UI\IRenderable' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\ComponentModel\IContainer' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\ComponentModel\IComponent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\Application\UI\ISignalReceiver' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\Application\UI\IStatePersistent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'ArrayAccess' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
				),
			),
			'Nette\Application\IPresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				),
			),
			'App\Presenters\AdminPresenter' => array(array('application.1')),
			'App\Presenters\AlertPresenter' => array(array('application.2')),
			'App\Presenters\AuctionPresenter' => array(array('application.3')),
			'App\Presenters\Error4xxPresenter' => array(array('application.4')),
			'App\Presenters\ErrorPresenter' => array(array('application.5')),
			'App\Presenters\HomepagePresenter' => array(array('application.6')),
			'App\Presenters\UserPresenter' => array(array('application.7')),
			'NetteModule\ErrorPresenter' => array(array('application.8')),
			'NetteModule\MicroPresenter' => array(array('application.9')),
			'Nette\DI\Container' => array(1 => array('container')),
		),
		'services' => array(
			'25_App_Forms_AdminCategoryFormFactory' => 'App\Forms\AdminCategoryFormFactory',
			'26_App_Forms_AdminDeleteCategoryFormFactory' => 'App\Forms\AdminDeleteCategoryFormFactory',
			'27_App_Forms_AdminDeleteDurationFormFactory' => 'App\Forms\AdminDeleteDurationFormFactory',
			'28_App_Forms_AdminDurationFormFactory' => 'App\Forms\AdminDurationFormFactory',
			'29_App_Forms_AlertFormFactory' => 'App\Forms\AlertFormFactory',
			'30_App_Forms_BidFormFactory' => 'App\Forms\BidFormFactory',
			'31_App_Forms_PasswordFormFactory' => 'App\Forms\PasswordFormFactory',
			'32_App_Forms_PhotoDeleteFormFactory' => 'App\Forms\PhotoDeleteFormFactory',
			'33_App_Forms_PhotoEditFormFactory' => 'App\Forms\PhotoEditFormFactory',
			'34_App_Forms_ProductDeleteFormFactory' => 'App\Forms\ProductDeleteFormFactory',
			'35_App_Forms_ProductFormFactory' => 'App\Forms\ProductFormFactory',
			'36_App_Forms_SignFormFactory' => 'App\Forms\SignFormFactory',
			'37_App_Forms_UploadProfilePhotoFormFactory' => 'App\Forms\UploadProfilePhotoFormFactory',
			'38_App_Forms_UserFormFactory' => 'App\Forms\UserFormFactory',
			'39_App_Model_Auction' => 'App\Model\Auction',
			'40_App_Model_Database' => 'App\Model\Database',
			'41_App_Model_Photo' => 'App\Model\Photo',
			'application.1' => 'App\Presenters\AdminPresenter',
			'application.2' => 'App\Presenters\AlertPresenter',
			'application.3' => 'App\Presenters\AuctionPresenter',
			'application.4' => 'App\Presenters\Error4xxPresenter',
			'application.5' => 'App\Presenters\ErrorPresenter',
			'application.6' => 'App\Presenters\HomepagePresenter',
			'application.7' => 'App\Presenters\UserPresenter',
			'application.8' => 'NetteModule\ErrorPresenter',
			'application.9' => 'NetteModule\MicroPresenter',
			'application.application' => 'Nette\Application\Application',
			'application.linkGenerator' => 'Nette\Application\LinkGenerator',
			'application.presenterFactory' => 'Nette\Application\IPresenterFactory',
			'cache.journal' => 'Nette\Caching\Storages\IJournal',
			'cache.storage' => 'Nette\Caching\IStorage',
			'container' => 'Nette\DI\Container',
			'database.default.connection' => 'Nette\Database\Connection',
			'database.default.context' => 'Nette\Database\Context',
			'database.default.conventions' => 'Nette\Database\Conventions\DiscoveredConventions',
			'database.default.structure' => 'Nette\Database\Structure',
			'http.context' => 'Nette\Http\Context',
			'http.request' => 'Nette\Http\Request',
			'http.requestFactory' => 'Nette\Http\RequestFactory',
			'http.response' => 'Nette\Http\Response',
			'latte.latteFactory' => 'Latte\Engine',
			'latte.templateFactory' => 'Nette\Application\UI\ITemplateFactory',
			'mail.mailer' => 'Nette\Mail\IMailer',
			'nette.latte' => 'Latte\Engine',
			'routing.router' => 'Nette\Application\IRouter',
			'security.user' => 'Nette\Security\User',
			'security.userStorage' => 'Nette\Security\IUserStorage',
			'session.session' => 'Nette\Http\Session',
			'tracy.bar' => 'Tracy\Bar',
			'tracy.blueScreen' => 'Tracy\BlueScreen',
			'tracy.logger' => 'Tracy\ILogger',
		),
		'tags' => array(
			'inject' => array(
				'application.1' => TRUE,
				'application.2' => TRUE,
				'application.3' => TRUE,
				'application.4' => TRUE,
				'application.5' => TRUE,
				'application.6' => TRUE,
				'application.7' => TRUE,
				'application.8' => TRUE,
				'application.9' => TRUE,
			),
			'nette.presenter' => array(
				'application.1' => 'App\Presenters\AdminPresenter',
				'application.2' => 'App\Presenters\AlertPresenter',
				'application.3' => 'App\Presenters\AuctionPresenter',
				'application.4' => 'App\Presenters\Error4xxPresenter',
				'application.5' => 'App\Presenters\ErrorPresenter',
				'application.6' => 'App\Presenters\HomepagePresenter',
				'application.7' => 'App\Presenters\UserPresenter',
				'application.8' => 'NetteModule\ErrorPresenter',
				'application.9' => 'NetteModule\MicroPresenter',
			),
		),
		'aliases' => array(
			'application' => 'application.application',
			'cacheStorage' => 'cache.storage',
			'database.default' => 'database.default.connection',
			'httpRequest' => 'http.request',
			'httpResponse' => 'http.response',
			'nette.cacheJournal' => 'cache.journal',
			'nette.database.default' => 'database.default',
			'nette.database.default.context' => 'database.default.context',
			'nette.httpContext' => 'http.context',
			'nette.httpRequestFactory' => 'http.requestFactory',
			'nette.latteFactory' => 'latte.latteFactory',
			'nette.mailer' => 'mail.mailer',
			'nette.presenterFactory' => 'application.presenterFactory',
			'nette.templateFactory' => 'latte.templateFactory',
			'nette.userStorage' => 'security.userStorage',
			'router' => 'routing.router',
			'session' => 'session.session',
			'user' => 'security.user',
		),
	);


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => 'C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app',
			'wwwDir' => 'C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\www',
			'debugMode' => TRUE,
			'productionMode' => FALSE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array('class' => NULL, 'parent' => NULL),
			'tempDir' => 'C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app/../temp',
		));
	}


	/**
	 * @return App\Forms\AdminCategoryFormFactory
	 */
	public function createService__25_App_Forms_AdminCategoryFormFactory()
	{
		$service = new App\Forms\AdminCategoryFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\AdminDeleteCategoryFormFactory
	 */
	public function createService__26_App_Forms_AdminDeleteCategoryFormFactory()
	{
		$service = new App\Forms\AdminDeleteCategoryFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\AdminDeleteDurationFormFactory
	 */
	public function createService__27_App_Forms_AdminDeleteDurationFormFactory()
	{
		$service = new App\Forms\AdminDeleteDurationFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\AdminDurationFormFactory
	 */
	public function createService__28_App_Forms_AdminDurationFormFactory()
	{
		$service = new App\Forms\AdminDurationFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\AlertFormFactory
	 */
	public function createService__29_App_Forms_AlertFormFactory()
	{
		$service = new App\Forms\AlertFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\BidFormFactory
	 */
	public function createService__30_App_Forms_BidFormFactory()
	{
		$service = new App\Forms\BidFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\PasswordFormFactory
	 */
	public function createService__31_App_Forms_PasswordFormFactory()
	{
		$service = new App\Forms\PasswordFormFactory($this->getService('security.user'), $this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Forms\PhotoDeleteFormFactory
	 */
	public function createService__32_App_Forms_PhotoDeleteFormFactory()
	{
		$service = new App\Forms\PhotoDeleteFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\PhotoEditFormFactory
	 */
	public function createService__33_App_Forms_PhotoEditFormFactory()
	{
		$service = new App\Forms\PhotoEditFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\ProductDeleteFormFactory
	 */
	public function createService__34_App_Forms_ProductDeleteFormFactory()
	{
		$service = new App\Forms\ProductDeleteFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\ProductFormFactory
	 */
	public function createService__35_App_Forms_ProductFormFactory()
	{
		$service = new App\Forms\ProductFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\SignFormFactory
	 */
	public function createService__36_App_Forms_SignFormFactory()
	{
		$service = new App\Forms\SignFormFactory($this->getService('security.user'), $this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Forms\UploadProfilePhotoFormFactory
	 */
	public function createService__37_App_Forms_UploadProfilePhotoFormFactory()
	{
		$service = new App\Forms\UploadProfilePhotoFormFactory($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Forms\UserFormFactory
	 */
	public function createService__38_App_Forms_UserFormFactory()
	{
		$service = new App\Forms\UserFormFactory($this->getService('security.user'), $this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\Auction
	 */
	public function createService__39_App_Model_Auction()
	{
		$service = new App\Model\Auction($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Model\Database
	 */
	public function createService__40_App_Model_Database()
	{
		$service = new App\Model\Database($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\Photo
	 */
	public function createService__41_App_Model_Photo()
	{
		$service = new App\Model\Photo($this->getService('40_App_Model_Database'));
		return $service;
	}


	/**
	 * @return App\Presenters\AdminPresenter
	 */
	public function createServiceApplication__1()
	{
		$service = new App\Presenters\AdminPresenter($this->getService('40_App_Model_Database'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->adminDeleteDurationFactory = $this->getService('27_App_Forms_AdminDeleteDurationFormFactory');
		$service->adminDurationFactory = $this->getService('28_App_Forms_AdminDurationFormFactory');
		$service->adminDeleteCategoryFactory = $this->getService('26_App_Forms_AdminDeleteCategoryFormFactory');
		$service->adminCategoryFactory = $this->getService('25_App_Forms_AdminCategoryFormFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\AlertPresenter
	 */
	public function createServiceApplication__2()
	{
		$service = new App\Presenters\AlertPresenter($this->getService('40_App_Model_Database'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->alertFactory = $this->getService('29_App_Forms_AlertFormFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\AuctionPresenter
	 */
	public function createServiceApplication__3()
	{
		$service = new App\Presenters\AuctionPresenter($this->getService('40_App_Model_Database'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->bidFactory = $this->getService('30_App_Forms_BidFormFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\Error4xxPresenter
	 */
	public function createServiceApplication__4()
	{
		$service = new App\Presenters\Error4xxPresenter($this->getService('40_App_Model_Database'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\ErrorPresenter
	 */
	public function createServiceApplication__5()
	{
		$service = new App\Presenters\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return App\Presenters\HomepagePresenter
	 */
	public function createServiceApplication__6()
	{
		$service = new App\Presenters\HomepagePresenter($this->getService('40_App_Model_Database'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->photoDeleteFactory = $this->getService('32_App_Forms_PhotoDeleteFormFactory');
		$service->photoEditFactory = $this->getService('33_App_Forms_PhotoEditFormFactory');
		$service->productDeleteFactory = $this->getService('34_App_Forms_ProductDeleteFormFactory');
		$service->productFactory = $this->getService('35_App_Forms_ProductFormFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\UserPresenter
	 */
	public function createServiceApplication__7()
	{
		$service = new App\Presenters\UserPresenter($this->getService('40_App_Model_Database'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->passwordFactory = $this->getService('31_App_Forms_PasswordFormFactory');
		$service->uploadProfilePhotoFactory = $this->getService('37_App_Forms_UploadProfilePhotoFormFactory');
		$service->userFactory = $this->getService('38_App_Forms_UserFormFactory');
		$service->signFactory = $this->getService('36_App_Forms_SignFormFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return NetteModule\ErrorPresenter
	 */
	public function createServiceApplication__8()
	{
		$service = new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return NetteModule\MicroPresenter
	 */
	public function createServiceApplication__9()
	{
		$service = new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('routing.router'));
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	public function createServiceApplication__application()
	{
		$service = new Nette\Application\Application($this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'));
		$service->catchExceptions = FALSE;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel($this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('application.presenterFactory')));
		return $service;
	}


	/**
	 * @return Nette\Application\LinkGenerator
	 */
	public function createServiceApplication__linkGenerator()
	{
		$service = new Nette\Application\LinkGenerator($this->getService('routing.router'), $this->getService('http.request')->getUrl(),
			$this->getService('application.presenterFactory'));
		return $service;
	}


	/**
	 * @return Nette\Application\IPresenterFactory
	 */
	public function createServiceApplication__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback($this, 5, 'C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app/../temp/cache/Nette%5CBridges%5CApplicationDI%5CApplicationExtension'));
		$service->setMapping(array(
			'*' => 'App\*Module\Presenters\*Presenter',
		));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\IJournal
	 */
	public function createServiceCache__journal()
	{
		$service = new Nette\Caching\Storages\FileJournal('C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app/../temp');
		return $service;
	}


	/**
	 * @return Nette\Caching\IStorage
	 */
	public function createServiceCache__storage()
	{
		$service = new Nette\Caching\Storages\FileStorage('C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app/../temp/cache',
			$this->getService('cache.journal'));
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	public function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	public function createServiceDatabase__default__connection()
	{
		$service = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=dp_auction_system', 'root', NULL, array('lazy' => TRUE));
		$this->getService('tracy.blueScreen')->addPanel('Nette\Bridges\DatabaseTracy\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, TRUE, 'default');
		return $service;
	}


	/**
	 * @return Nette\Database\Context
	 */
	public function createServiceDatabase__default__context()
	{
		$service = new Nette\Database\Context($this->getService('database.default.connection'), $this->getService('database.default.structure'),
			$this->getService('database.default.conventions'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Database\Conventions\DiscoveredConventions
	 */
	public function createServiceDatabase__default__conventions()
	{
		$service = new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
		return $service;
	}


	/**
	 * @return Nette\Database\Structure
	 */
	public function createServiceDatabase__default__structure()
	{
		$service = new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	public function createServiceHttp__context()
	{
		$service = new Nette\Http\Context($this->getService('http.request'), $this->getService('http.response'));
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	public function createServiceHttp__request()
	{
		$service = $this->getService('http.requestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'http.request\', value returned by factory is not Nette\Http\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	public function createServiceHttp__requestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy(array());
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	public function createServiceHttp__response()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\ILatteFactory
	 */
	public function createServiceLatte__latteFactory()
	{
		return new Container_57160c6847_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory($this);
	}


	/**
	 * @return Nette\Application\UI\ITemplateFactory
	 */
	public function createServiceLatte__templateFactory()
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory($this->getService('latte.latteFactory'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('security.user'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Mail\IMailer
	 */
	public function createServiceMail__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Latte\Engine
	 */
	public function createServiceNette__latte()
	{
		$service = new Latte\Engine;
		trigger_error('Service nette.latte is deprecated, implement Nette\Bridges\ApplicationLatte\ILatteFactory.',
			16384);
		$service->setTempDirectory('C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}


	/**
	 * @return Nette\Application\IRouter
	 */
	public function createServiceRouting__router()
	{
		$service = App\RouterFactory::createRouter();
		if (!$service instanceof Nette\Application\IRouter) {
			throw new Nette\UnexpectedValueException('Unable to create service \'routing.router\', value returned by factory is not Nette\Application\IRouter type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	public function createServiceSecurity__user()
	{
		$service = new Nette\Security\User($this->getService('security.userStorage'));
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	/**
	 * @return Nette\Security\IUserStorage
	 */
	public function createServiceSecurity__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session.session'));
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	public function createServiceSession__session()
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		return $service;
	}


	/**
	 * @return Tracy\Bar
	 */
	public function createServiceTracy__bar()
	{
		$service = Tracy\Debugger::getBar();
		if (!$service instanceof Tracy\Bar) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.bar\', value returned by factory is not Tracy\Bar type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\BlueScreen
	 */
	public function createServiceTracy__blueScreen()
	{
		$service = Tracy\Debugger::getBlueScreen();
		if (!$service instanceof Tracy\BlueScreen) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.blueScreen\', value returned by factory is not Tracy\BlueScreen type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\ILogger
	 */
	public function createServiceTracy__logger()
	{
		$service = Tracy\Debugger::getLogger();
		if (!$service instanceof Tracy\ILogger) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.logger\', value returned by factory is not Tracy\ILogger type.');
		}
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		header('X-Frame-Options: SAMEORIGIN');
		header('X-Powered-By: Nette Framework');
		header('Content-Type: text/html; charset=utf-8');
		Nette\Reflection\AnnotationsParser::setCacheStorage($this->getByType("Nette\Caching\IStorage"));
		Nette\Reflection\AnnotationsParser::$autoRefresh = TRUE;
		$this->getService('session.session')->exists() && $this->getService('session.session')->start();
	}

}



final class Container_57160c6847_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory implements Nette\Bridges\ApplicationLatte\ILatteFactory
{
	private $container;


	public function __construct(Container_57160c6847 $container)
	{
		$this->container = $container;
	}


	public function create()
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}

}
