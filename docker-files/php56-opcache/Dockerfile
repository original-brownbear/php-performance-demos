FROM php:5.6-cli

RUN rm -f /usr/local/etc/php/conf.d/*cache* && echo -e "zend_extension=opcache.so\nopcache.enable_cli=1\nopcache.fast_shutdown=1\nopcache.validate_timestamps=0" > /usr/local/etc/php/conf.d/opcache.ini
