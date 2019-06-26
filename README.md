


Получаю ответ в таком виде - похоже , но не соответствует:
Возможно, стоит переписать с использованием \Datetime..
или что не правильно в формулах 
 
pc-user@i:~/Code/test_w/ERIAL-test-task$ php index.php 
Array
(
    [periodStartDate] => 2019-02-04
    [periodEndDate] => 2019-03-03
    [interestCounted] => 6.42
    [amountStart] => 1234.55
    [amountEnd] => 1240.97
)
Array
(
    [periodStartDate] => 2019-03-04
    [periodEndDate] => 2019-04-03
    [interestCounted] => 7.13
    [amountStart] => 1240.97
    [amountEnd] => 1248.12
)
Array
(
    [periodStartDate] => 2019-04-04
    [periodEndDate] => 2019-05-03
    [interestCounted] => 6.9
    [amountStart] => 1248.12
    [amountEnd] => 1255.07
)
Test 1 OK
Test 2 OK
Test 3 failed



Используемая среда:
 - PHP 7.1
 - Временная зона по умолчанию: UTC
 - strict_types = 1

:grey_exclamation:Вы не можете делать изменения в файле index.php.
:grey_exclamation:Все изменения разрешены только в **Deposit.class.php**

Необходимо дополнить класс Deposit таким образом, чтоб он удовлетворял всем условиям и прошёл тест.
В классе производится расчёт процентов по вкладу на выбранный период.

- По умолчанию, дата может быть передана во временной зоне UTC, но все расчёты осуществляются в Europe/Tallinn;
- Сумма (amount) может быть от 1000.00 до 10000.00;
- Длительность вклада (duration) от 1 до 36 месяцев;
- Годовая процентная ставка (interest) от 6.00% до 12.00%;
- Период капитализации процентов составляет 1 месяц (это означит, что каждый месяц мы добавляем невыплаченный процент к основной сумме вклада);
- Начисленный процент за месяц зависит от количества дней в месяце и от количества дней в году;
- Формула расчёта универсальная и легко находится в Google;
- Дополнительные комментарии в Deposit.class.php.

Всего надо будет пройти 3 подтеста в процессе выполнения: два из них сопутствующие, и самый последний, который связан с расчётами - самый важный.

В случае каких-либо вопросов, пожалуйста свяжитесь.

Удачи!
