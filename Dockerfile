FROM php:7.4-apache-bullseye
EXPOSE 80
EXPOSE 443
RUN apt-get update && apt-get install -y ssl-cert \
    && a2enmod ssl && a2ensite default-ssl