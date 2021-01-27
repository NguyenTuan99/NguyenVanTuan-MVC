<?php

namespace MVC\Models;

use MVC\Models\TaskModel;
use MVC\Models\TaskResourceModel;
use MVC\Core\ResourceModel;

class TaskRepository
{
    protected $taskResource;

    public function __construct()
    {
        $this->taskResource = new TaskResourceModel();
    }

    public function add($model)
    {
        return $this->taskResource->save($model);
    }

    public function update($model)
    {
        return $this->taskResource->save($model);
    }

    public function get($id)
    {
        return $this->taskResource->find($id);
    }

    public function delete($model)
    {
        return $this->taskResource->delete($model);
    }

    public function getALl()
    {
        return $this->taskResource->showAll();
    }

}

?>