#!/usr/bin/env bash

for PHP_VERSION in "5.4" "5.5" "5.6" "7"
do
	echo -e "\nPHP ${PHP_VERSION}\n"
	docker run -t --rm -v "$PWD":/src php:${PHP_VERSION}-cli php /src/inline.php
done
