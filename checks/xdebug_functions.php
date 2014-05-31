<?php
function fix_string($a)
{
    xdebug_break();
    echo "Called @ ".
        xdebug_call_file().
        ":".
        xdebug_call_line().
        " from ".
        xdebug_call_function();
}

$ret = fix_string(array('Derick'));

echo "<br/> after break  File:" . __FILE__ . " line:" . __LINE__ . "<br/>\r\n";