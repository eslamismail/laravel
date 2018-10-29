<?php


namespace App\Billing;



class Stripe
{


	protected $key = true ;
	public function __construct($key)
	{
		$this->key = $key;
	}
}