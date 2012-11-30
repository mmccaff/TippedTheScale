<?php

function time_ago($date,$granularity=2) {
    $date = strtotime($date);
    $difference = time() - $date;
    $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800, 
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
        'second' => 1);
        
    $retval = "";
                                 
    foreach ($periods as $key => $value) {
        if ($difference >= $value) {
            $time = floor($difference/$value);
            $difference %= $value;
            $retval .= ($retval ? ' ' : '').$time.' ';
            $retval .= (($time > 1) ? $key.'s' : $key);
            $granularity--;
        }
        if ($granularity == '0') { break; }
    }
    if ($retval == "") {
	$retval = " 1 second ";
    }
    return $retval.' ago';      
}

function time_from($date,$granularity=2) {
    $date = strtotime($date);
    $difference = $date - time();
    $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800, 
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
        'second' => 1);
        
    $retval = "";
                                 
    foreach ($periods as $key => $value) {
        if ($difference >= $value) {
            $time = floor($difference/$value);
            $difference %= $value;
            $retval .= ($retval ? ' ' : '').$time.' ';
            $retval .= (($time > 1) ? $key.'s' : $key);
            $granularity--;
        }
        if ($granularity == '0') { break; }
    }
    if ($retval == "") {
	$retval = " 1 second ";
    }
    return $retval.' from now';      
}

function time_diff($date, $i) {
	$dt = strtotime($date);
	$difference = $dt - time();
	if ($difference > 0) {
		return (time_from($date, $i));
	} else {
		return (time_ago($date, $i));
	}
}

?>
