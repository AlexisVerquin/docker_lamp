# DOCKER LAMP BY VERANET
This docker contain a Linux Apache Mysql PHP enviroment

## Prerequisites
* [Docker V3](https://www.docker.com/)

## Services
* Apache2
* Mysql-8.0
* PhpMyAdmin
* Mailhog
* Redis


## Installation
    git clone https://github.com/AlexisVerquin/docker_lamp.git
    cd docker_lamp
    
Rename or copy **.env.example** file to **.env**

Modify the variables in **docker-compose.yml** and **.env** according to your needs
    
    docker-compose up --build
    

## Usage
Modify the variables in **docker-compose.yml** and **.env**  according to your needs


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

## If you want move docker root dir (Linux)
    ``` 
        # Stop Docker service to prevent any issue with race condition
        sudo service docker stop
        
        # The new place of Docker
        sudo mkdir -p /home/docker
        
        # Copy files to new directory (with permission preservation)
        sudo cp -ar /var/lib/docker /home/docker
        
        # Create the custom service configuration directory
        sudo mkdir -p /etc/systemd/system/docker.service.d 
        
        # Define the new Docker root directory ("-g" option)
        sudo bash -c 'echo -e "[Service]\nExecStart=\nExecStart=/usr/bin/dockerd -g /home/docker -H fd://" > /etc/systemd/system/docker.service.d/service.root-dir.conf'
        
        # Reload the configurations (will include our new configuration) of systemd
        sudo systemctl daemon-reload
        
        # Restart Docker service
        sudo service docker start
        
        # MUST be our new path (/home/docker)
        docker info | grep "Docker Root Dir:"
        
        #
        # If the previous command return what we expect
        # you can remove the directory /var/lib/docker/
        #
    
    ```

    
        
