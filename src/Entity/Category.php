<?php
namespace App\Entity;

class Category
{
    private ?int $id;
    private string $name;
    public function __construct(string $name, ?int $id = null) {
        $this->id = $id;
        $this->name = $name;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

