<?php
require_once dirname(dirname(__FILE__)) . "/common/globals.php";
$address = '127.0.0.1';
$port = 9000;
$sessionId = "PHPSTORM";
$sock = socket_create(AF_INET, SOCK_STREAM, 0);
if (!socket_bind($sock, $address, $port)) {
    echo "unable to bind socket <br/>\n";
    if (ini_get('xdebug.remote_enable')!='1'){
        echo "make sure you have = 1 in php.ini " . php_ini_loaded_file();
        die;
    }

}
socket_listen($sock);
$client = socket_accept($sock);
echo "connection established $client <br/>";
socket_close($client);
socket_close($sock);

$actualUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$scriptUrl = strtok($actualUrl, '?');
$targetUrl = $scriptUrl . '?XDEBUG_SESSION_START=' . $sessionId;
$link = "<a href='$targetUrl'>start session</a>";
echo $link;
if (ini_get('xdebug.remote_handler')!='dbgp'){
    echo "<br/> For sessions you need xdebug.remote_handler=dbgp in php.ini " . php_ini_loaded_file() . "\n";
}
