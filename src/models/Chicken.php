<?php

namespace app\models;

class Chicken extends Animal
{
    private const MIN_EGG = 0;
    private const MAX_EGG = 1;
    public const PRODUCT_NAME = 'яиц';
    public const ANIMAL_NAME = 'Куриц';


    /**
     * возвращает случайное число яиц с 1 курицы
     * @throws \Exception
     */


    public function getProducts()
    {
        return random_int(self::MIN_EGG, self::MAX_EGG);
    }


}