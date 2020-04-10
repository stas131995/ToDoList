<?php

namespace App\Controllers;

use App\Repositories\TaskRepository;
use Jenssegers\Blade\Blade;
use App\Models\TaskModel;

class TodoController
{
    public function index()
    {
        $repository = new TaskRepository();
        $todoItems = $repository->getAll();
        $this->view("home", compact("todoItems"));
    }

    public function create()
    {
        $repository = new TaskRepository();
        $title = $_POST['title'];
        $description = $_POST['description'];
        $todoItems = $repository->getAll();
        $errors = [];
        if (empty($title)) {
            $errors['title'] = "Title Require!!";
        } elseif (strlen($title) < 3) {
            $errors['title'] = "Less than 3!!";
        }
        if (empty($description)) {
            $errors['description'] = "Description Require!!";
        }
        if (count($todoItems) >= 10) {
            $errors['count'] = "More Than Ten!!";
        }
        if (count($errors) == 0) {
            $task = new TaskModel();
            $task->setTitle($title);
            $task->setDescription($description);
            $repository->create($task);
            array_unshift($todoItems, $task);
        }
        $this->view("home", compact("todoItems", "errors"));
    }

    public function update()
    {
        $repository = new TaskRepository();
        $task = $repository->getById($_POST['id']);
        $task->setDone($task->getDone() ? 0 : 1);
        $repository->update($task);
        $todoItems = $repository->getAll();
        $this->view("home", compact("todoItems"));
        
    }

    public function delete()
    {
        $repository = new TaskRepository();
        $repository->deleteById($_POST['id']);
        $todoItems = $repository->getAll();
        $this->view("home", compact("todoItems"));
    }

    protected function view(string $viewName, array $params)
    {
        $blade = new Blade(ROOT_DIR . '/src/views', ROOT_DIR . '/cache/views');
        echo $blade->render($viewName, $params);
    }
}