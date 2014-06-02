<?php
if (function_exists('xdebug_is_enabled')){
    if (xdebug_is_enabled()){
        echo "it seems xdebug is installed and enabled showing memory usage is \n";
        echo number_format(xdebug_memory_usage());
    }
    else{
        echo "xdebug is installed but not enabled \n";
    }
}
else{
    echo 'it seems like xdebug is not installed <a href="http://xdebug.org/wizard.php">http://xdebug.org/wizard.php</a> \n' ;
}