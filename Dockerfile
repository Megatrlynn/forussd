# Use the official PHP image as the base image
FROM php:7.4-apache

# Copy the current directory contents into the container at /var/www/html
COPY public/ /var/www/html/

# Install dependencies if needed (none in this example)
# RUN docker-php-ext-install pdo pdo_mysql

# Ensure the container uses the port 80 to serve the web app
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
