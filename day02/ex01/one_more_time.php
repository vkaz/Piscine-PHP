#!/usr/bin/php
<?php
if ($argc === 2) {
	if (!preg_match('/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ([1-3][0-9]?) ([Jj]anvier|[Ff][eé]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[uû]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][ée]cembre) ([0-9]{4}) [0-9]{2}:[0-9]{2}:[0-9]{2}$/', $argv[1])) {
		echo "Wrong Format\n";
		return (0);
	}
	else {
		date_default_timezone_set("Europe/Paris");
		$res = explode(" ", $argv[1]);
		$num = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
		$mounth = array('/[Jj]anvier/', '/[Ff][eé]vrier/', '/[Mm]ars/', '/[Aa]vril/', '/[Mm]ai/',
		 '/[Jj]uin/', '/[Jj]uillet/', '/[Aa]o[uû]t/', '/[Ss]eptembre/', '/[Oo]ctobre/', '/[Nn]ovembre/', '/[Dd][ée]cembre/');
		$res[2] = preg_replace($mounth, $num, $res[2]);
		$ss = strtotime("$res[3]-$res[2]-$res[1] $res[4]");
		echo "$ss\n";
	}
}
?>
