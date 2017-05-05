# Purpose

Install XDebug and troubleshoot why it is not working

## Where to start

*  Start with http://xdebug.org/wizard.php
*  try to enable most of xdebug.settings , turn off later if they are not needed
   like
 * `xdebug.profiler_enable = 1`
 * `xdebug.remote_host=localhost`
 * `#If using vagrant and host ip is like 192.168.131.??`
 * `#xdebug.remote_host=192.168.131.1`
* go to checks/first_check.php
* check files as they are needed

A common line start can be
`php -d xdebug.profiler_enable=1 -d xdebug.profiler_output_dir=/xampp/php/tmp`
 on windows might try something like

```
C:\xampp\php\php.exe -dxdebug.remote_enable=1 -dxdebug.remote_host=127.0.0.1 -dxdebug.remote_port=9000 -dxdebug.remote_mode=req C:\xampp\htdocs\xdebug\exp.php
```

## Command line
on linux command prompt might have to use soemthing like

```
XDEBUG_CONFIG="idekey=netbeans-xdebug" php -dxdebug.remote_host=`echo $SSH_CLIENT | cut -d "=" -f 2 | awk '{print $1}'` shell/scirpt_namet.php --parameter-name
```
can create a wraper shell script like
```
export PHP_IDE_CONFIG="serverName=$1"
export XDEBUG_CONFIG="remote_connect_back=0 idekey=netbeans-xdebug remote_host=127.0.0.1"
shift
php "$@"
```
and then you can call this script like
* `xdebug_cli local.website.com  script_file.php arguments`


### Vagrant

In case of vagrant you need to specifiy in phpstorm the deployment server where mapping for deployment path on server is .

in vagrant phpinfo make sure that you have `xdebug_remote.enabled = 1`

Other settings will look like this


```
sudo vi /etc/php5/fpm/conf.d/20-xdebug.ini
xdebug.remote_enable=1
xdebug.remote_host=192.168.131.1
```
`xdebug.remote_host` should be same configuration as `$_SERVER["REMOTE_ADDR"]`

For PHPStorm and browser integration look at `IDE Key` in phpinfo `xdebug` section.
In PHPStorm check your Servers in settings.

### Vagrant xdebug connection test
Make sure host machine does not has a firewall rule stopping the xdebug connection.

If your vagrant ip is like 192.168.131.?? In vagrant try
* telnet 192.168.131.1 9000
* To quick telnet use Ctr ] and then enter quit
* If issues on HOST machine do `sudo service iptables stop`

### Vagrant command line 

Approahc is similar but you need to specify right ip address. 
If in you `Vagrantfile` you have `web.vm.network "private_network", ip: "192.163.31.10"`
your xdebug remote path will be like `192.163.31.1`
If unsure look at the contents of your `/etc/php5/fpm/conf.d/20-xdebug.ini`.
Config option `xdebug.remote_host` will tell the right ip address for the script
I tried `grep -r "xdebug" /etc/php5/` but it did not work for me
```
export PHP_IDE_CONFIG="serverName=dev.actualwebsite.com"
export XDEBUG_CONFIG="remote_connect_back=0 idekey=netbeans-xdebug remote_host=ip -> $_SERVER["REMOTE_ADDR"]"
php -dxdebug.remote_enable=1  "$@"
```

### phpunit

* check your local version `phpunit --version`
* download that version from https://github.com/sebastianbergmann/phpunit/releases
* Extract it to your local path which is gitignored, or which you can gitignore now.
* go to that directory and run `composer install`
* Changge PHP Server Mapping (won't be needed)
* PHPStorm > Setting > Languages & FrameWorks > PHP > Servers
* run unit tests like `xdebug_cli local.domain.com zain_custom/external/phpunit-4.6.6/phpunit --group groupname`

### soap
* disable browser xdebug cookie
* append `?XDEBUG_SESSION=1234` OR `&XDEBUG_SESSION=1234` to soap request url

### shared server
you can use `.htaccess` something like
```
php_flag  xdebug.remote_autostart on
```

or inside your visual host 
```
....
<Direcotry /path/dir>
     php_value upload_max_filesize 5M

...
