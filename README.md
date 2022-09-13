Тестове задание.

======================
сбор продукции с фермы.  

Приложение умеет:  
Добавлять животных в хлев;  
● Собирать продукцию у всех животных;  
● Подсчитывать общее кол-во собранной продукции.
● Подсчитывать общее кол-во животных на ферме.


Использование
------------

При запуске скрипта **main.php** в консоли:  
● Приложение добавляет животных в хлев;  
● Выводит кол-во добавленых животных; 
● Производит сбор продукции со всех животных(1 раз в день, всего 7 раз)  
● Выводит на экран общее кол-во собранных шт. яиц и литров молока.  
● Добавляет еще животных в хлев;
● Выводит кол-во добавленых животных; 
● Производит сбор продукции со всех животных(1 раз в день, всего 7 раз) 
● Выводит на экран общее кол-во собранных шт. яиц и литров молока.  



####  Краткое описание файловой системы приложения

**main.php** - файл запуска приложения;

**src/models** - папка с файлами классов;

**Animal.php** - родительский абстрактный класс животных;

**Chicken.php** - класс куриц;

**Cow.php** - класс коров;

**Farm.php** - Класс Хлева

Autoload происходит средствами composer, так что для корректной работы необходимо его инициализировать



