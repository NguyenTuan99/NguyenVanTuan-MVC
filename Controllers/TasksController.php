<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskModel;
use MVC\Models\TaskRepository;

class TasksController extends Controller
{
    private $taskRepository;

        public function __construct()
        {
            $this->taskRepository = new TaskRepository();
        }

    function index()
    {
        $task = new TaskModel();

        $d['tasks'] = $this->taskRepository->getAll($task);

        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        extract($_POST);

        if (isset($_POST["title"])) {

            $task = new TaskModel();
            $task->setTitle($title);
            $task->setDescription($description);

            if ($this->taskRepository->add($task))
            {
                header("Location: " . WEBROOT . "Tasks/index");
            }   
        }
            $this->render("create");
    }

    function edit($id)
    {
        extract($_POST);

        $task = new TaskModel();

        $d['task'] = $this->taskRepository->get($id);

        if (isset($_POST["title"])) {

            $task->setId($id);
            $task->setTitle($title);
            $task->setDescription($description);

            if ($this->taskRepository->update($task)) {

                header("Location: " . WEBROOT . "Tasks/index");
            }
        }

        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = new TaskModel();
        $task->setId($id);

        if ($this->taskRepository->delete($task)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>