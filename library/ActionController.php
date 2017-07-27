<?php
namespace Library;

/**
 * Base Action controller class
 * @createdOn April 23, 2015
 * @author Naresh Maharjan <nareshmaharjan@lftechnology.com>
 * @package CodeceptionDemo
 * @subPackage Library
 */

abstract class ActionController
{
    /**
     * @var View $view instance of view class
     */
    protected $view;

    /**
     * @var Router $router router class instance
     */
    protected  $router;

    /**
     * on run make an instance of the config class and view class
     */
    final function __construct()
    {
        $this->router = new Router();
        $this->view = new View();

        $this->view->controller = $_SESSION['controller'];
        $this->view->action = $_SESSION['action'];

        $this->init();
    }
    final function __destruct()
    {
        $this->view->render();
    }

    public function init()
    {}

}
