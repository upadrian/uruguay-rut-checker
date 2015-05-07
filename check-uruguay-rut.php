<?php

header("content-type:text/plain");



function checkRut($rut) {
	if (strlen($rut) != 12 || !is_numeric($rut))
		return false;
	$dc = substr($rut, 11, 1);
	$rut = substr($rut, 0, 11);
	$total = 0;
	$factor = 2;
	for ($i = 10; $i >= 0; $i--) {
		$total += ($factor * substr($rut, $i, 1));
		$factor = ($factor == 9)?2:++$factor;
	}
	$dv = 11 - ($total % 11);
	if ($dv == 11)
		$dv = 0;
	elseif ($dv == 10)
		$dv = 1;
	return $dv == $dc;
}

$ruts = array(
	"211003420017",
	"211406340011",
	"080213100019",
	"123456789012",
	"123456789015",
	"aaaxxxxaaa",
	"13123"
);
	
foreach ($ruts as $rut) {
	echo "{$rut} = ";
	var_dump(checkRut($rut));
	echo "\n";
}

?>