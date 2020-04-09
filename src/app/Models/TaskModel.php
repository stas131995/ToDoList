<?php

namespace App\Models;

class TaskModel
{
    private $id;

    private $title;

    private $description;

    private $done = 0;

    private $created_date;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDone(): string
    {
        return $this->done;
    }

    public function setDone(bool $done): void
    {
        $this->done = intval($done);
    }

    public function getCreatedDate(): string
    {
        return $this->created_date;
    }

    public function setCreatedDate(string $date): void
    {
        $this->created_date = date_format(date_create($date), 'Y-m-d');
    }
    
}
