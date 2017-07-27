<?php
namespace Controllers;

/**
 * Task controller
 *
 * @createdOn: April 17, 2015
 * @author: Naresh Maharjan <nareshmaharjan@lftechnology.com>
 * @package: CodeceptionDemo
 * @subpackage: controllers
 */

use Library\ActionController;
use \Models\Task as TaskModel;

class Task extends ActionController
{
    /**
     * @var TaskModel $taskModel task model instance
     */
    private $taskModel;

    /**
     * constructor function
     */
    public function init()
    {
        parent::init();
        $this->taskModel = new TaskModel();
    }

    /**
     * task dashboard action
     */
    public function dashboard()
    {
    }

    /**
     * get all the tasks
     */
    public function getTask()
    {
        $status = '%';
        if(isset($_GET['status'])){
            $status = $_GET['status'];
        }
        $data = $this->taskModel->getTasks($status);
        $this->view->setJsonContent($data);
    }

    /**
     * add new task
     */
    public function addTask()
    {
        if(isset($_GET['task'])){
            $task = $_GET['task'];
        }
        $data = $this->taskModel->addTask($task);
        $this->view->setJsonContent($data);
    }

    /**
     * delete a task
     */
    public function deleteTask()
    {
        if(isset($_GET['taskID'])){
            $taskID = $_GET['taskID'];
        }
        $data =$this->taskModel->deleteTask($taskID);
        $this->view->setJsonContent($data);
    }

    /**
     * update a task
     */
    public function updateTask()
    {
        if(isset($_GET['taskID'])){
            $status = $_GET['status'];
            $taskID = $_GET['taskID'];
        }
        $data = $this->taskModel->updateTask($status, $taskID);
        $this->view->setJsonContent($data);
    }
} 