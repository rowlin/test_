<?php
/*
 * This is a test task for ERIAL jobseeker interview
 * 
 * Environment used:
 * - PHP 7.1
 * - Default timezone: UTC
 * - strict_types = 1
 * 
 * You are now allowed to change this file.
 * All changes are alowed only in Deposit.class.php
 * 
 */

declare(strict_types = 1);
error_reporting(E_ALL);
date_default_timezone_set('UTC');

require_once 'Deposit.class.php';
$testIsPassed = [0,0,0];


/**
 * Test 1.
 * Let's try to set wrong interest for deposit.
 */

$interest = 12.345;
try {
	( new Deposit() )->setInterest( $interest );
} catch (Exception $e) {
	if ( $interest * 100 - $e->getCode() == -0.5 && strcmp("Interest is out of bounds", $e->getMessage()) == 0	)
		$testIsPassed[0] = 1;
}



/**
 * Test 2.
 * Here we are trying to set wrong amount to deposit.
 */

try {
	( new Deposit() )->setAmount(0);
} catch (Exception $e) {
	if ( ($e->getCode() - 012345 ^ 1234) == 646 && strcmp("Amount is out of bounds", $e->getMessage()) == 0 )
		$testIsPassed[1] = 1;
}



/**
 * Test 3.
 * getSchedule() should return an array that is equal to original one
 */

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
	

	
	
// This is just a small output for you to check if test is passed
array_walk($testIsPassed, function($value, $key){
	echo "Test ".++$key.( $value ? " OK" : " failed" ).PHP_EOL;
});