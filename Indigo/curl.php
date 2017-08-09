<?php
/**
 * Created by PhpStorm.
 * User: tbrooks
 * Date: 01/08/2017
 * Time: 09:51
 */

// Random put with quotes

$ch = curl_init();
$url = "http://www.punoftheday.com/cgi-bin/arandompun.pl";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
$trim = explode ("')", $output);
echo substr($trim[0], 16);


// Pun of the day with quotes

$ch = curl_init();
$url = "http://www.dictionary.com/wordoftheday/";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
$trim = explode("')", $output);
echo "<br/><br/><br/><br/><span style='margin-top:200px;'>Pun of the day: <quote>" . substr($trim[0], 16) . "</quote></span>";