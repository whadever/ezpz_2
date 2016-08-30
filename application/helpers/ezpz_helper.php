<?php

 function hash_password($password){

		return hash('sha512', $password . config_item('encryption_key'));

}


function wordlimiter($string, $limit = 1){

	return str_replace('&#8230;','',word_limiter($string, $limit));

}


function verification_code(){
	return bin2hex(openssl_random_pseudo_bytes(32));
}


function NZD($number){

		return '$ '.number_format($number,2);

}