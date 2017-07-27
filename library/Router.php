<?php
namespace Library;

/**
 * Routing Helper class
 *
 * @createdOn: April 16, 2015
 * @author: Naresh Maharjan <nareshmaharjan@lftechnology.com>
 * @package: CodecetionDemo
 * @subpackage: library
 */

class Router
{
    /**
     * @var string|null $controller controller
     */
    public $controller = null;

    /**
     * @var string|null $action action
     */
    public $action = null;

    /**
     * @var array $params extra parameters
     */
    private $params = array();

    /**
     * @var string|null $url url
     */
    private $url;


    /**
     * start session if not
     */
    private function sessionStart()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * set routring parameters
     */
    private function setRouterParameters()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->controller = isset($url[0]) ? $url[0] : null;
            $this->action = isset($url[1]) ? $url[1] : null;
            unset($url[0], $url[1]);

            $this->params = array_values($url);

        } else {
            $this->controller = 'user';
            $this->action = 'login';
        }
    }

    /**
     * set url parameter
     */
    private function setUrl()
    {
        if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
        $this->url = $protocol . "://" . $_SERVER['HTTP_HOST'];
    }

    /**
     * start routing process
     */
    public function route()
    {
        $this->sessionStart();
        if (PHP_SAPI === 'cli') {
            return TRUE;
        }
        $this->setUrl();
        $this->setRouterParameters();
        if (empty($_SESSION['is_authenticated'])) {
            $this->controller = 'user';
            $this->action = 'login';
        }
        $this->setSessionParams();
        $this->dispatch();
    }

    /**
     * start dispatch process
     */
    private function dispatch()
    {
        $controllerClass = "Controllers\\" . $this->getController();
        $class = new $controllerClass($this);
        call_user_func_array(array($class, $this->action), array($this->params));
    }

    /**
     * get current controller name
     *
     * @return string
     */
    private function getController()
    {
        return ucfirst($this->controller);
    }

    /**
     * redirect user to new page/controller/action
     *
     * @param array $params
     */
    public function redirect(Array $params)
    {
        $this->controller = !empty($params['controller']) ? $params['controller'] : null;
        $this->action = !empty($params['action']) ? $params['action'] : null;
        $redirectUrl = $this->url . "/{$this->controller}/{$this->action}";
        header("Location: $redirectUrl", true);
    }

    /**
     * set session parameter
     */
    private function setSessionParams()
    {
        $_SESSION['controller'] = $this->getController();
        $_SESSION['action'] = $this->action;
    }
} 