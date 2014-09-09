# Purpose

Install XDebug and troubleshoot why it is not working

## Where to start

1. Start with http://xdebug.org/wizard.php
2. try to enable most of xdebug.settings , turn off later if they are not needed
   
   like
   xdebug.profiler_enable = 1
   xdebug.profiler_enable_trigger = 1
   xdebug.extended_info = 1
   xdebug.remote_enable = on
   xdebug.show_local_vars = 1
3. go to checks/first_check.php
4. check files as they are needed

A common line start can be
```
php -d xdebug.profiler_enable=1 -d xdebug.profiler_output_dir=/xampp/php/tmp
 ```
 on windows might try something like

```
C:\xampp\php\php.exe -dxdebug.remote_enable=1 -dxdebug.remote_host=127.0.0.1 -dxdebug.remote_port=9000 -dxdebug.remote_mode=req C:\xampp\htdocs\xdebug\exp.php
```

on linux command prompt might have to use soemthing like

```
XDEBUG_CONFIG="idekey=netbeans-xdebug" php -dxdebug.remote_host=`echo $SSH_CLIENT | cut -d "=" -f 2 | awk '{print $1}'` shell/scirpt_namet.php --parameter-name
```
can create a wraper shell script like
```
export PHP_IDE_CONFIG="serverName=localdomainname"
export XDEBUG_CONFIG="remote_connect_back=0 idekey=netbeans-xdebug remote_host=ipaddress"
php "$@"
```

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
## License

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
* Neither the name of Mr PHP nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.


