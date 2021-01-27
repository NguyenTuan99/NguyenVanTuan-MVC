<?php

namespace MVC\Models;

use MVC\Models\TaskResourceModel;

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

    public function get($model)
    {
        return $this->taskResource->find($model);
    }

    public function delete($model)
    {
        return $this->taskResource->delete($model);
    }

    public function getAll()
    {
        return $this->taskResource->showAll();
    }

}

?>