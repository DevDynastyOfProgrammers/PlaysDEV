    FROM debian:latest

    # Metadata
    LABEL maintainer="sergmatcadet@gmail.com"

    # Install necessary packages
    RUN apt-get update && apt-get install -y nginx curl openssl

    # Remove default nginx config
    RUN rm /etc/nginx/sites-available/default && rm /etc/nginx/sites-enabled/default

    # Copy custom nginx config
    COPY default /etc/nginx/sites-available/default
    RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/

    # Remove default certificates
    RUN rm -f /etc/nginx/ssl/nginx.key && rm -f /etc/nginx/ssl/nginx.crt

    # Copy custom certificates
    COPY ssl /etc/nginx/ssl

    # Create SSL certificates
    # RUN mkdir /etc/nginx/ssl
    # RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/nginx.key -out /etc/nginx/ssl/nginx.crt

    # Copy html content
    COPY html /var/www/html

    # Expose port
    EXPOSE 80
    EXPOSE 443

    # Unroot user
    RUN groupadd -r usernginx && useradd -r -g usernginx usernginx
    RUN mkdir -p /var/run && \
    chown -R usernginx:usernginx /var/run /var/log/nginx /etc/nginx /etc/nginx/ssl /var/www /var/www/html && \
    chmod -R 755 /var/log/nginx /etc/nginx/ssl /var/www

    # Start nginx
    CMD ["nginx", "-g", "daemon off;"]
