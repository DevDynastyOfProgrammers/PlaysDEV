    FROM debian:latest

    # Metadata
    LABEL maintainer="sergmatcadet@gmail.com"

    # Install necessary packages
    RUN apt-get update && apt-get install -y apache2 php libapache2-mod-php

    # Configure ports info file
    COPY ports.conf /etc/apache2/

    # Copy php info file
    COPY info.php /var/www/html/

    # Copy secondserver folder
    COPY secondserver /var/www/html/secondserver/

    # Enable required modules
    RUN a2enmod php8.2

    # Unroot user
    RUN groupadd -r apache && useradd -r -g apache apache && chown -R apache:apache /var/www/html /var/log/apache2 /var/run/apache2
    USER apache

    # Expose port
    EXPOSE 8080

    # Start apache
    CMD ["apache2ctl", "-D", "FOREGROUND"]
