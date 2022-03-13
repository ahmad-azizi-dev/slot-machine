FROM php:7.3

RUN apt-get update
RUN apt-get install zip -y
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer