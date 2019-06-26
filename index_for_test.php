<?php

declare(strict_types = 1);
error_reporting(E_ALL);
date_default_timezone_set('UTC');

require_once 'Deposit.class.php';

$date_now =date("Y-m-d H:i:s");
$time = time();
$month = date("m",strtotime($date_now));
//$next_m = ;
if((integer) $month < $month+1){
    print "true". PHP_EOL ;
}


$limit = 1; # No.of months

date_default_timezone_set('Europe/Tallinn');

$start_date = "2019-02-03 23:00:00";
$maxDays=date('t', strtotime($start_date));//колличество дней

$start_date = round(strtotime($start_date)/(3600*24))*(3600*24);//округляем
$start_date = date ("Y-m-d", (integer) $start_date);
$end_date =date("Y-m-d");

//->setAmount( 1234.545 )
//->setInterest( 6.78 )
print $maxDays . PHP_EOL;
$sum  = 1234.545+(1234.545 * $maxDays * 6.78/(100*365));
print $sum . PHP_EOL;



print "start  :" .$start_date .' end '. strtotime($end_date) . PHP_EOL;





while (strtotime($start_date) < strtotime($end_date)) {
    print $start_date .PHP_EOL;

    $start_date = date ("Y-m-d", strtotime("+1 Month", strtotime($start_date)));
}

die();
$originalSchedule = json_decode('[
{"periodStartDate":"2019-02-04","periodEndDate":"2019-03-03","interestCounted":6.42,"amountStart":1234.55,"amountEnd":1240.97},
{"periodStartDate":"2019-03-04","periodEndDate":"2019-04-03","interestCounted":7.15,"amountStart":1240.97,"amountEnd":1248.12},
{"periodStartDate":"2019-04-04","periodEndDate":"2019-05-03","interestCounted":6.96,"amountStart":1248.12,"amountEnd":1255.08}
]', true);

$newSchedule = ( new Deposit() )
    ->setDate( new DateTime("2019-02-03 23:00:00") )
    ->setAmount( 1234.545 )
    ->setInterest( 6.78 )
    ->setMonths( 3 )
    ->getSchedule();

if( $newSchedule=== $originalSchedule)
    $testIsPassed[2] = 1;





?>