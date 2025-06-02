FROM php:8.2-apache

RUN a2enmod rewrite

# Apache directory access config
RUN echo '<Directory /var/www/html/>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/vulbapp.conf \
    && a2enconf vulbapp

COPY . /var/www/html/
WORKDIR /var/www/html/
RUN chown -R www-data:www-data /var/www/html/logs /var/www/html/uploads
EXPOSE 80

