<?php

namespace app\models;

class Farm
{
    /**
     * вся ферма формируется в конструкторе
     *
     * @var array $animals  массив объектов с животными
     * @var array $products массив объектов с продукцией
     */
    public array $animals;

    public array $products;

    public function __construct(array $animals)
    {
        $this->animals = $this->getAnimals($animals);
        $this->products = [];
    }

    /**
     * @param array $animals Приходящий из конструктора массив
     *
     * @return array Массив с объектами животных
     */
    private function getAnimals(array $animals)
    {
        $animalsArray = [];
        foreach ($animals as $name => $quantity) {
            $animalLowerCaseName = strtolower($name);
            $className = ucfirst($animalLowerCaseName);
            $objName = __NAMESPACE__.'\\'.$className;

            for ($i = 1; $i <= $quantity; $i++) {
                try {
                    $newObj = new $objName;
                } catch (\Error $ex) {
                    print 'такого животного нет в хлеве нет';
                    die();
                }
                if ($newObj instanceof Animal) {
                    $animalsArray[$newObj::ANIMAL_NAME][] = $newObj;
                }
            }
        }

        return $animalsArray;
    }


    /**
     * Формируем массив с продукцией каждого животного
     *
     * @return array Массив с продукцией для конструктора
     */
    private function countProducts()
    {
        $product = [];

        foreach ($this->animals as $name => $animalsKey) {
            foreach ($animalsKey as $animal) {
                if ($animal instanceof Animal) {
                    if (!isset($product[$animal::PRODUCT_NAME])) {
                        $product[$animal::PRODUCT_NAME] = $animal->getProducts();
                    } else {
                        $product[$animal::PRODUCT_NAME] += $animal->getProducts();
                    }
                }
            }
        }

        return $product;
    }

    /**
     * Добавляем животных
     *
     * @param array $animals
     */
    public function addAnimals(array $animals)
    {
        $animalsList = $this->getAnimals($animals);


        foreach ($animalsList as $animalName => $animalsKey) {
            foreach ($animalsKey as $animal) {
                if (!isset($this->products[$animal::PRODUCT_NAME])) {
                    $this->products[$animal::PRODUCT_NAME] = $animal->getProducts();
                } else {
                    $this->products[$animal::PRODUCT_NAME] += $animal->getProducts();
                }
                $this->animals[$animal::ANIMAL_NAME][] = $animal;
            }
        }
    }

    /**
     * Производим подсчет продукции
     * @return string Строка с результатом подсчета
     */
    public function countAnimalsProduct()
    {
        $resultStr = 'За неделю мы имеем ';

        foreach ($this->products as $type => $amount) {
            $resultStr .= $type.' '.$amount.', ';
        }

        $resultStr = substr($resultStr, 0, -2);

        return $resultStr.PHP_EOL;
    }

    /**
     * Производим подсчет животных
     * @return string Строка с результатом подсчета
     */
    public function animalsInfo()
    {
        $resultStr = 'На ферме имеется ';

        foreach ($this->animals as $type => $amount) {
            $resultStr .= $type.' '.count($amount).', ';
        }

        $resultStr = substr($resultStr, 0, -2);

        return $resultStr.PHP_EOL;
    }

    /**
     * Производим сбор продукции за 1 день
     */
    public function oneDayResult()
    {
        $dayResult = $this->countProducts();

        if ($this->products) {
            foreach ($this->products as $type => $product) {
                $this->products[$type] += $dayResult[$type];
            }
        } else {
            $this->products = $dayResult;
        }
    }

}