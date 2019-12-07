# README

Simple test environment to provoke time-outs either from nginx, apache, or php.


## Environment

Server 1:

- nginx:alpine
- php-fmp:alpine
- fastcgi_read_timeout: 10s

Server 2:

- nginx:alpine
- php-fmp:alpine
- fastcgi_read_timeout: 10s


## Run

~~~bash
git clone timeout-tests
cd timeout-tests
docker-compose up
~~~


## Server 1

Here we're calling scripts on web server 1, which make calls to web server 2. 


### PHP Info

- <http://localhost:9090/phpinfo.php>


### Nginx Time-out

- <http://localhost:9090/test_nginx_time_out.php>

~~~
Warning: fopen(http://web2/nginx_time_out.php): failed to open stream: HTTP request failed! HTTP/1.1 504 Gateway Time-out in /srv/www/test_nginx_time_out.php on line 3
~~~


### PHP Time-out

- <http://localhost:9090/test_php_time_out.php>

Dies after 5 seconds.

~~~
Fatal error: Maximum execution time of 5 seconds exceeded in /srv/www/php_time_out.php on line 3
~~~


### Flush Output

- <http://localhost:9090/test_flush_output.php>

Should run forever ;-)



## Server 2

Here we are calling the same scripts on web server 2 directly.


### PHP Info

- <http://localhost:9091/phpinfo.php>


### Nginx Time-out

- <http://localhost:9091/nginx_time_out.php>

~~~
504 Gateway Time-out
nginx/1.17.6
~~~


### PHP Time-out

- <http://localhost:9091/php_time_out.php>

Dies after 5 seconds.

~~~
Fatal error: Maximum execution time of 5 seconds exceeded in /srv/www/php_time_out.php on line 3
~~~
