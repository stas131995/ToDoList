<?php

namespace App\Controllers;

use App\Repositories\TaskRepository;
use App\Models\TaskModel;

class TodoController
{
    public function index()
    {
        $repository = new TaskRepository();
        $todoItems = $repository->getAll();
        $this->view("view", compact("todoItems"));
    }

    public function create()
    {
        $repository = new TaskRepository();
        $errors = [];
        $title = $_POST['title'];
        $description = $_POST['description'];
        if (empty($title)) {
            $errors[] = "Title Require!!";
        } elseif (empty($description)) {
            $errors[] = "Description Require!!";
        } else {
            $task = new TaskModel();
            $task->setTitle($title);
            $task->setDescription($description);
            $repository->create($task);
        }
        $todoItems = $repository->getAll();
        $this->view("view", compact("todoItems", "errors"));
    }

    public function update()
    {
        $repository = new TaskRepository();
        $task = $repository->getById($_POST['id']);
        $task->setDone($task->getDone() ? 0 : 1);
        $repository->update($task);
        $todoItems = $repository->getAll();
        $this->view("view", compact("todoItems"));
        
    }

    public function delete()
    {
        $repository = new TaskRepository();
        $repository->deleteById($_POST['id']);
        $todoItems = $repository->getAll();
        $this->view("view", compact("todoItems"));
    }

    protected function view(string $viewName,array $params)
    {
        extract($params);
        include ROOT_DIR . "/views/{$viewName}.php";
    }

}