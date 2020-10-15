FROM php:7.4-apache

# Install PHP modules
RUN docker-php-ext-install  pdo pdo_mysql \
    && docker-php-ext-enable  pdo pdo_mysql

# mhsendmail dependencies
RUN apt-get update -y && apt-get install -y --no-install-recommends \
    golang-go \
    git

RUN apt-get install -y --no-install-recommends nmap

# mhsendmail
RUN GOPATH=$HOME/go \
    PATH=$PATH:$GOROOT/bin:$GOPATH/bin \
    go get github.com/mailhog/mhsendmail
RUN ln  ~/go/bin/mhsendmail /usr/bin/mhsendmail

# INstall Apache Modules
RUN a2enmod rewrite
