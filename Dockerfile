FROM php:7.4-apache-bullseye
EXPOSE 80
EXPOSE 443
RUN echo "==================== Instalando certificados de SSL y git (dependencia de composer) ====================" \
    && apt-get update && apt-get install -y ssl-cert git \
    && cd /var/www \
    && echo "==================== Instalando composer ====================" \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && echo "==================== Instalando dompdf con composer ====================" \
    && php composer.phar require dompdf/dompdf \
    && echo "==================== Habilitando SSL en Apache ====================" \
    && a2enmod ssl && a2ensite default-ssl