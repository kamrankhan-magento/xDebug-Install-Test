<?php
echo "<br/> before break  File:" . __FILE__ . " line:" . __LINE__ . "<br/>\r\n";
xdebug_break();
echo "<br/> after break  File:" . __FILE__ . " line:" . __LINE__ . "<br/>\r\n";

$a=1;
echo "<br/> after manual break  File:" . __FILE__ . " line:" . __LINE__ . "<br/>\r\n";