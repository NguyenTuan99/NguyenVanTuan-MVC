<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskModel;
use MVC\Models\TaskRepository;
use MVC\Models\TaskResourceModel;

class TasksController extends Controller
{
    function index()
    {

        $tasks = new TaskRepository();
        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {

            $task = new TaskRepository();
            $model = new TaskModel();

            $model->setTitle($_POST["title"]);
            $model->setDescription($_POST["description"]);
       
            if ($task->add($model))
            {
                 header("Location: " . WEBROOT . "Tasks/index");               
            }
            
        }
            $this->render("create");
    }

    function edit($id)
    {
      
        $task = new TaskRepository();

        $d["task"] = $task->get($id);

        $model = new TaskModel();

        if (isset($_POST["title"]))
        {
            $model->setTitle($_POST["title"]);
            $model->setDescription($_POST["description"]);
            
            if ($task->update($model))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {

        $task = new TaskRepository();
        $tk1= new TaskModel();
        $tk1->setId($id);

        if ($task->delete($tk1))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>