# DOCKER LAMP BY VERANET
This docker contain a Linux Apache Mysql PHP enviroment
(Other Language Soon)

## Prerequisites
* [Docker V3](https://www.docker.com/)
* [Docker Compose](https://docs.docker.com/compose/install/)

## Services
* Apache2 - PHP
* Mysql-8.0
* PhpMyAdmin
* Mailhog
* Redis

## Installation
    git clone https://github.com/AlexisVerquin/docker_lamp.git
    cd docker_lamp
    
Rename or copy **.env.example** file to **.env**

## Usage
Modify the variables in **.env**  according to your needs

Start Docker and Detach
    
    docker-compose up -d
    
View running Dockers

    docker ps
    
Stop image
    
    docker stop [container_name]
    
Stop all images

    docker stop $(docker ps -a -q)
    
## If you want get acces in terminal image
    sudo docker exec -it [name] /bin/bash