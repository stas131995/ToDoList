<?php

namespace App\Repositories;

use App\Models\TaskModel;
use App\DB\DB;

class TaskRepository
{
    private function mapResultToModel(array $result): TaskModel
    {
        $model = new TaskModel();
        $model->setId($result['id']);
        $model->setTitle($result['title']);
        $model->setDescription($result['description']);
        $model->setDone($result['done']);
        $model->setCreatedDate($result['created_date']);
        return $model;
    }

    public function getAll(): array
    {
       $query = DB::query(
           "SELECT 
               id,
               title,
               description,
               done,
               created_date 
           FROM tasks
           ORDER BY done, created_date DESC"
       );
       $result = $query->fetch_all(MYSQLI_ASSOC);
       return array_map(function ($row) {
           return $this->mapResultToModel($row);
       }, $result);
    }

    public function getById($id): TaskModel
    {
        $query = DB::query(
            "SELECT 
                id,
                title,
                description,
                done,
                created_date
            FROM tasks
            WHERE id = {$id}"
        );
        $result = $query->fetch_assoc();
        return $this->mapResultToModel($result);
    }

    /**
     * Обрати внимание на первый аргумент метода - а особенно
     * на символ & который обозначает ссылку на переменную.
     * 
     * То есть если я изменю значение этой переменной, то оно
     * изменится не только в методе, но и там, где его вызвали.
     * 
     * Если обратить внимание, то в конце метода я изменяю перемнную
     * $model на новую модель, но уже с id, который я получил ранее из базы.
     * 
     * Маленький трюк чтобы при создании записи, метод getId возвращал
     * актуальный id из базы.
     */
    public function create(TaskModel &$model): void
    {
        DB::query(
            "INSERT INTO tasks 
                (title, description) 
                VALUES ('{$model->getTitle()}', '{$model->getDescription()}');"
        );
        $id = DB::getConnection()->insert_id;
        $model->setId($id);
        $model->setCreatedDate("now");
    }

    public function update(TaskModel $model): void
    {
        DB::query(
            "UPDATE tasks 
                SET
                    title = '{$model->getTitle()}',
                    description = '{$model->getDescription()}',
                    done = '{$model->getDone()}'
                WHERE id = {$model->getId()};"
        );
    }

    public function deleteById($id): bool
    {
        return DB::query("DELETE FROM tasks WHERE id = {$id}");
    }

    public function delete(TaskModel $model): bool
    {
        return $this->deleteById($model->getId());
    }
}