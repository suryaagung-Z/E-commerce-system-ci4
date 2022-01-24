<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\App;
use Exception;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['cookie', 'test'];

    /**
     * Constructor.
     */

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // REGIS HELPER
        regisHelper1($this);

        // Cookie Name
        $this->idCookieName = urlencode('Njk2NDVmNzU3MzY1NzI=');
        $this->idSessionName = 'id_user';

        // Load Encryption 
        $this->enc        = \Config\Services::encrypter();
        // Load Session
        $this->mySess     = \Config\Services::session();
        // Load Form Validation
        $this->formValid  = \Config\Services::validation();
        // Load Method Request
        $this->reqGet     = \Config\Services::request();

        // DB
        $this->dbProduct  = new \App\Models\user\Product;
        $this->dbCategory = new \App\Models\user\Product_category;
        $this->dbCart     = new \App\Models\user\Cart;
        $this->dbUser     = new \App\Models\user\User;
        $this->dbCookie   = new \App\Models\user\Cookie_storage;
    }

    public function loginRequire()
    {
        if (isset($_COOKIE[$this->idCookieName])) {
            $getCookie = get_cookie($this->idCookieName);
            try {
                $decr = $this->enc->decrypt(hex2bin($getCookie));
            } catch (Exception $th) {
                return false;
            }

            $checkCookie = $this->dbCookie->getCookie($decr, 'byId');
            if ($checkCookie != NULL) {
                return $this->dbUser->getUser($checkCookie['user_id'], 'byId');
            } else {
                return false;
            }
        }

        if (isset($_SESSION[$this->idSessionName])) {
            $getSession = $this->mySess->get($this->idSessionName);
            if ($getSession != NULL) {
                return $this->dbUser->getUser($getSession, 'byId');
            } else {
                return false;
            }
        }

        return null;
    }
}
