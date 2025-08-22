# Use official PHP with Apache
FROM php:8.2-apache

# Enable Apache mod_rewrite (needed for Laravel routes)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configure Apache to serve Laravel's public directory
RUN echo '<VirtualHost *:10000> \
    DocumentRoot /var/www/html/public \
    <Directory /var/www/html/public> \
        AllowOverride All \
        Require all granted \
    </Directory> \
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Expose Render’s port
EXPOSE 10000

# Start Apache
CMD ["apache2-foreground"]
