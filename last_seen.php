<?php
function relativeTime($time, $short = false){
    $SECOND = 1;
    $MINUTE = 60 * $SECOND;
    $HOUR = 60 * $MINUTE;
    $DAY = 24 * $HOUR;
    $MONTH = 30 * $DAY;
    $before = time() - $time;

    if ($before < 0)
    {
        return "not yet";
    }

    if ($short){
        if ($before < 1 * $MINUTE)
        {
            return ($before <5) ? "just now" : $before . " ago";
        }

        if ($before < 2 * $MINUTE)
        {
            return "1m ago";
        }

        if ($before < 45 * $MINUTE)
        {
            return floor($before / 60) . "m ago";
        }

        if ($before < 90 * $MINUTE)
        {
            return "1h ago";
        }

        if ($before < 24 * $HOUR)
        {

            return floor($before / 60 / 60). "h ago";
        }

        if ($before < 48 * $HOUR)
        {
            return "1d ago";
        }

        if ($before < 30 * $DAY)
        {
            return floor($before / 60 / 60 / 24) . "d ago";
        }


        if ($before < 12 * $MONTH)
        {
            $months = floor($before / 60 / 60 / 24 / 30);
            return $months <= 1 ? "1mo ago" : $months . "mo ago";
        }
        else
        {
            $years = floor  ($before / 60 / 60 / 24 / 30 / 12);
            return $years <= 1 ? "1y ago" : $years."y ago";
        }
    }

    if ($before < 1 * $MINUTE)
    {
        return ($before <= 1) ? "just now" : $before . " seconds ago";
    }

    if ($before < 2 * $MINUTE)
    {
        return "a minute ago";
    }

    if ($before < 45 * $MINUTE)
    {
        return floor($before / 60) . " minutes ago";
    }

    if ($before < 90 * $MINUTE)
    {
        return "an hour ago";
    }

    if ($before < 24 * $HOUR)
    {

        return (floor($before / 60 / 60) == 1 ? 'about an hour' : floor($before / 60 / 60).' hours'). " ago";
    }

    if ($before < 48 * $HOUR)
    {
        return "yesterday";
    }

    if ($before < 30 * $DAY)
    {
        return floor($before / 60 / 60 / 24) . " days ago";
    }

    if ($before < 12 * $MONTH)
    {

        $months = floor($before / 60 / 60 / 24 / 30);
        return $months <= 1 ? "one month ago" : $months . " months ago";
    }
    else
    {
        $years = floor  ($before / 60 / 60 / 24 / 30 / 12);
        return $years <= 1 ? "one year ago" : $years." years ago";
    }

    return "$time";
}

function last_seen($ttime){
    return relativeTime(strtotime($ttime));
}
function read_able($ttime){
    return date("M j,Y h:i:s a",strtotime($ttime));
}
function read_able2($ttime){
    return date("M j,Y",strtotime($ttime));
}
function remove_tags($value){
$value=htmlspecialchars_decode($value);
$value=html_entity_decode($value);
$value=strip_tags($value);
$value=htmlspecialchars($value);
return $value;
}
?>