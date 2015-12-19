#!/usr/bin/env bash

cd ./php54-xdebug
docker build -t originalbrownbear/php:5.4-cli-xdebug .
cd ..
cd ./php55-xdebug
docker build -t originalbrownbear/php:5.5-cli-xdebug .
cd ..
cd ./php56-xdebug
docker build -t originalbrownbear/php:5.6-cli-xdebug .
cd ..
cd php7-xdebug
docker build -t originalbrownbear/php:7-cli-xdebug .

docker push originalbrownbear/php:5.4-cli-xdebug
docker push originalbrownbear/php:5.5-cli-xdebug
docker push originalbrownbear/php:5.6-cli-xdebug
docker push originalbrownbear/php:7-cli-xdebug
