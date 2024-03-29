ARG php_version

FROM php:$php_version

# Install SSL
RUN apt-get update \
 && DEBIAN_FRONTEND=noninteractive apt-get install -y ssl-cert \
 && rm -r /var/lib/apt/lists/*

# enable ssl module and enable the default-ssl site
RUN a2enmod ssl \
 && a2ensite default-ssl

# Install PHP modules
RUN apt-get update -y && apt-get install -y libpng-dev


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
    git \ 
    nmap \
    iputils-ping \
    vim 

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

# Install Apache Modules
RUN a2enmod rewrite

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/apache-selfsigned.key -out /etc/ssl/certs/apache-selfsigned.crt -subj "/C=FR/ST=France/L=Lille/O=Veranet/OU=IT Department/CN=localhost"

RUN mkdir /usr/tools
COPY sites-availables/ /etc/apache2/sites-available/
COPY conf/ /etc/apache2/conf-available/

RUN for file in /etc/apache2/sites-available/*; do \
        if [ -f "$file" ]; then \
            a2ensite $(basename "$file"); \
        fi; \
    done

RUN for file in /etc/apache2/conf-available/*; do \
        if [ -f "$file" ]; then \
            a2enconf $(basename "$file"); \
        fi; \
    done

CMD ["apachectl", "-D", "FOREGROUND"]

