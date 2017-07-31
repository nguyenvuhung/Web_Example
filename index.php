<?php
include_once('Bitfinex.php');
echo 'NGUYEN VU HUNG';
echo '\n';

$api_key = 'r5BwSJvqPrlQwuReKMLmxhlPU9p0tt9CshJl95vJ4r1';
$api_secret = 'mPJXTBIV1guW4n1A6yE8BUdBy0efjviMtwigWjB89wY';
$bfx = new Bitfinex($api_key, $api_secret);

var_dump($bfx->get_symbols());
?>
