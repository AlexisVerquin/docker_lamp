ARG phpver=7.4
FROM php:7.4-apache

# Install SSL
RUN apt-get update \
 && DEBIAN_FRONTEND=noninteractive apt-get install -y ssl-cert \
 && rm -r /var/lib/apt/lists/*

# enable ssl module and enable the default-ssl site
RUN a2enmod ssl \
 && a2ensite default-ssl

# Install PHP modules
RUN apt-get update -y && apt-get install -y libpng-dev

# Install Node
RUN apt-get install nodejs -y

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev 


RUN docker-php-ext-install  pdo pdo_mysql \
    && docker-php-ext-enable  pdo pdo_mysql \
    && docker-php-ext-install mysqli && docker-php-ext-enable mysqli \ 
    && docker-php-ext-install gd

# mhsendmail dependencies
RUN apt-get update -y && apt-get install -y --no-install-recommends \
    golang-go \
    git

#FOR DEV
RUN apt-get install -y --no-install-recommends nmap iputils-ping vim

# mhsendmail
RUN GOPATH=$HOME/go \
    PATH=$PATH:$GOROOT/bin:$GOPATH/bin \
    go get github.com/mailhog/mhsendmail
RUN ln  ~/go/bin/mhsendmail /usr/bin/mhsendmail


RUN apt-get update -qq && \
    apt-get install -qy \
    git \
    gnupg \
    unzip \
    zip \
    webp

#Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# INstall Apache Modules
RUN a2enmod rewrite

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/apache-selfsigned.key -out /etc/ssl/certs/apache-selfsigned.crt -subj "/C=FR/ST=France/L=Lille/O=Veranet/OU=IT Department/CN=localhost"

COPY conf/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY conf/ssl.conf /etc/apache2/sites-available/ssl-default.conf
COPY conf/apache.conf /etc/apache2/conf-available/z-app.conf

RUN a2enconf z-app.conf
RUN a2ensite ssl-default.conf
