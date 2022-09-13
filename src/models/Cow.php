<?php

namespace app\models;

class Cow extends Animal
{

    private const MIN_MILK = 8;
    private const MAX_MILK = 12;
    public const PRODUCT_NAME = 'Молока';
    public const ANIMAL_NAME = 'Коров';


    /**
     * Возвращает случайное число молока с 1 коровы
     * @throws \Exception
     */
    public function getProducts()
    {
        return random_int(self::MIN_MILK, self::MAX_MILK);
    }
}