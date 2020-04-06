<?php

namespace App\Controllers;

use App\Repositories\TaskRepository;
use App\Models\TaskModel;

class TodoController
{
    public function index()
    {
        $repository = new TaskRepository();
        $tasks = $repository->getAll();
        $this->view($tasks);
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
        $tasks = $repository->getAll();
        $this->view($tasks, $errors);
    }

    public function update()
    {
        $repository = new TaskRepository();
        $task = $repository->getById($_POST['id']);
        $task->setDone($task->getDone() ? 0 : 1);
        $repository->update($task);
        $tasks = $repository->getAll();
        $this->view($tasks);
        
    }

    public function delete()
    {
        $repository = new TaskRepository();
        $repository->deleteById($_POST['id']);
        $tasks = $repository->getAll();
        $this->view($tasks);
    }

    protected function view($todoItems, $errors = [])
    {
        require "../Views/view.php";
    }
}