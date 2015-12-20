FROM php:5.5-cli

RUN rm -f /usr/local/etc/php/conf.d/*cache* && echo -e "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20121212/opcache.so\nopcache.enable_cli=1\nopcache.fast_shutdown=1\nopcache.validate_timestamps=0" > /usr/local/etc/php/conf.d/opcache.ini
