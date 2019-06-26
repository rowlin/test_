<?php

class Deposit{
	
	private $date = null;
	private $amount = null;
	private $interest = null;
	private $months = null;
	
	
	/**
	 * Return counted schedule
	 * @return array
	 */
	public function getSchedule() : array
	{
        date_default_timezone_set('Europe/Tallinn');
	    $start_date =  $this->date->format("Y-m-d");//округляем
        //$start_date = date ("Y-m-d", $this->date);
        $period_end_date = date ("Y-m-d", strtotime( '-1 day', strtotime($start_date)));

        for ($i= 0; $i < $this->months; $i++ ) {
            $period_end_date =  date ("Y-m-d", strtotime("+1 month", strtotime($period_end_date)));
            $array[$i]["periodStartDate"] = $start_date ;
            $array[$i]["periodEndDate"] = $period_end_date;
            $days = date('t', strtotime($start_date));//колличество дней
            $amountEnd = $this->amount + ($this->amount * $days * $this->interest /(100*365));
            $interest =  100*(pow((1 + $this->interest * $days/365/100),12)-1);
            $array[$i]["interestCounted"] = round($interest, 2);
            $array[$i]["amountStart"] = round($this->amount , 2);
            $array[$i]["amountEnd"] = round($amountEnd  , 2 ) ;
            $this->amount = $amountEnd;
            //print_r($array[$i]);
            $start_date =  date ("Y-m-d", strtotime("+1 month", strtotime($start_date)));
        }

		$schedule = $array;

		return $schedule;		
	}
	
	
	/**
	 * Set deposit start date
	 * 
	 * @todo
	 * - Date should be in local Europe/Tallinn timezone
	 * 
	 * @param \DateTime $date
	 * @return Deposit
	 */
	public function setDate( \DateTime $date ) : Deposit
	{

         //DateTime::createFromFormat('Y-m-d H:i:s', $date);
        $this->date = $date->setTimezone(new DateTimeZone('Europe/Tallinn'));

		return $this;
	}
	
	
	/**
	 * Get deposit start date
	 * @return \DateTime
	 */
	public function getDate() : \DateTime
	{

		return  $this->date;
	}
	
	
	/**
	 * Set deposit amount
	 * 
	 * @todo
	 * - Amount should be rounded to 2 decimal places
	 * - Possible range: [1000.00;10000.00]
	 * - If it is out of bounds, throw an exception
	 *
     *
     *
    $i = 0;
    for ($i ; $i < 1000000 ; $i++){
                if ( ($i - 012345 ^ 1234)== 646){
                    print $i;
                    break;
            }
            else {
                print $i . PHP_EOL;
            }
    }
     *
     *
     *
	 * @param float $amount
	 * @return Deposit
	 */
	public function setAmount( float $amount) : Deposit
	{
	    $amo = round($amount, 2);
	    if($amo >= 1000.00 & $amo <= 10000.00){
            $this->amount = $amo;
        }else throw  new Exception('Amount is out of bounds' , 6969 );
		return $this;
	}
	
	
	/**
	 * Get deposit amount
	 * @return float
	 */
	public function getAmount() : float
	{
		return $this->amount;
	}
	
	
	/**
	 * Set deposit duration in months
	 * 
	 * @todo
	 * - Possible range: [1;36]
	 * - If it is out of bounds, assign to closest possible value (1 or 36)
	 * 
	 * @param int $months
	 * @return Deposit
	 */
	public function setMonths( int $months ) : Deposit
	{
	    if($months >= 1 & $months <=36){
            $this->months = $months;
        }else throw  new Exception('Months it is out of bounds, assign to closest possible value (1 or 36)');

		return $this;
	}
	
	
	/**
	 * Get deposit duration in months
	 * @return int
	 */
	public function getMonths() : int
	{
		return $this->months;
	}
	
	
	/**
	 * Set deposit interest rate
	 * 
	 * @todo
	 * - Interest should be rounded to 2 decimal places
	 * - Possible range: [6.00;12.00]
	 * - If it is out of bounds, throw an exception
	 * 
	 * @param float $interest
	 * @return Deposit
	 */
	public function setInterest( float $interest ) : Deposit
	{
	    if($interest >= 6.00 & $interest <= 12.00) {
            $this->interest = round($interest ,2);
        }else
           throw new Exception('Interest is out of bounds', round($interest ,2)*100);
		return  $this;
	}
	
	
	/**
	 * Get deposit interest rate
	 * @return float
	 */
	public function getInterest() : float
	{
		return $this->interest ;
	}
	
	
}

