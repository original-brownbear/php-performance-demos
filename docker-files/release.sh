#!/usr/bin/env bash

cd ./php54-xdebug
docker build -t originalbrownbear/php:5.4-cli-xdebug .
cd ..
cd ./php54-opcache
docker build -t originalbrownbear/php:5.4-cli-opcache .
cd ..
cd ./php55-xdebug
docker build -t originalbrownbear/php:5.5-cli-xdebug .
cd ..
cd ./php55-opcache
docker build -t originalbrownbear/php:5.5-cli-opcache .
cd ..
cd ./php56-xdebug
docker build -t originalbrownbear/php:5.6-cli-xdebug .
cd ..
cd ./php56-opcache
docker build -t originalbrownbear/php:5.6-cli-opcache .
cd ..
cd ./php7-opcache
docker build -t originalbrownbear/php:7-cli-opcache .
cd ..
cd php7-xdebug
docker build -t originalbrownbear/php:7-cli-xdebug .

docker push originalbrownbear/php:5.4-cli-xdebug
docker push originalbrownbear/php:5.4-cli-opcache
docker push originalbrownbear/php:5.5-cli-xdebug
docker push originalbrownbear/php:5.5-cli-opcache
docker push originalbrownbear/php:5.6-cli-xdebug
docker push originalbrownbear/php:5.6-cli-opcache
docker push originalbrownbear/php:7-cli-xdebug
docker push originalbrownbear/php:7-cli-opcache
