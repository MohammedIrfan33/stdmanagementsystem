# Use an official Laravel-friendly PHP + Apache image
FROM richarvey/nginx-php-fpm:latest

# Set working directory
WORKDIR /var/www/html

# Copy everything
COPY . .

# Install dependencies with Composer
RUN composer install --no-dev --optimize-autoloader

# Fix permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose Render’s port
EXPOSE 10000

# Start Nginx + PHP-FPM
CMD ["/start.sh"]
