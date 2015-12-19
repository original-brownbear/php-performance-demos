FROM php:5.5-cli

RUN pecl install xdebug-2.4.0RC3 && echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20121212/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini
