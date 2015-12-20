FROM php:5.4-cli

RUN pecl install zendopcache-7.0.5 && echo -e "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20100525/opcache.so\nopcache.enable_cli=1\nopcache.fast_shutdown=1\nopcache.validate_timestamps=0" > /usr/local/etc/php/conf.d/opcache.ini
