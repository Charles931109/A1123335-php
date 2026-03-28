FROM php:8.2-apache


RUN printf '<Directory /var/www/html/>\n\tOptions +Indexes\n</Directory>\n' > /etc/apache2/conf-available/indexes.conf && a2enconf indexes

WORKDIR /var/www/html

EXPOSE 80
