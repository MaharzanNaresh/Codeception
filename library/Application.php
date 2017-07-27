<?php
namespace Library;

/**
 * Generic helper class
 *
 * @createdOn: April 17, 2015
 * @author: Naresh Maharjan <nareshmaharjan@lftechnology.com>
 * @package: CodeceptionDemo
 * @subpackage: library
 */

class Application
{
    /**
     * constructor function
     */
    public function __construct()
    {
        $router = new Router();
        $router->route();
    }

    /**
     * check if request if type of POST or not
     *
     * @return bool
     */
    public static function isPost()
    {
        if(!empty($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            return true;
        }
        return false;
    }

    /**
     * get the POST data
     *
     * @return array|null
     */
    public static function getPost()
    {
        if(self::isPost()){
            return $_POST;
        }
        return null;
    }
} 