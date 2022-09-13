<?php

namespace app\models;

abstract class Animal
{

    /**
     * @var string $animalId Уникальный id животного
     */
    public string $animalId;
    public string $minVaule;
    public string $maxValue;

    public function __construct()
    {
        $this->animalId = uniqid('', true);

    }


    /**
     * @return int Случайное число продукции
     */
    abstract public function getProducts();

}