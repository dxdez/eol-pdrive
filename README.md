# Proto Drive

> **Note: This project is no longer actively maintained. There are no assurances that the project will function without issues. It has been archived for historical purposes. Feel free to explore the code, but please note that it is no longer in use or supported.**

A simple google drive clone written in Laravel and Vue. This project is meant to be a prototype for a self-hostable homelab solution. 


### Setting Up in Your Local Enviornment
In a linux enviornment there are some tools that are needed; these include the following: git, docker + docker, compose

To install git run the following command:
`````
sudo dnf install git #Fedora, Rocky, RHEL, etc.
apt-get install #Debian, Ubuntu, etc.
`````

For CentOS, Rocky and RHEL based systems, run the following commands:
`````
sudo dnf config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
sudo dnf -y install docker-ce docker-ce-cli containerd.io docker-compose-plugin
`````

For other distributions, the convenience script is the best option:
`````
curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh ./get-docker.sh
`````

Make sure docker is active:
`````
sudo systemctl --now enable docker
`````

Once Docker is installed, it is important to establish a non-root user into the Docker group to avoid running docker with the `sudo` prefix; this can avoid complications later. To add a non root user to the group follow the below commands:
`````
sudo groupadd docker # Note, group should have been added after install
sudo usermod -aG docker $USER
newgrp docker
`````
You can verify that this worked by running a general docker command like: `docker --version` without the super user prefix.


### Cloning the Project
Once the docker enviornment is setup, you can now clone the desired project. 

Using git, run the following command in the desired project folder:
`````
https://github.com/{username}/{repository}.git
`````

Replace username with the owner of the repository and replace the repository keyword with the actual project name. You can then navigate into the folder:
`````
cd {repository-name}
`````

#### Setting up a .env file
By default, a typical project won't include its .env file for security reasons. For your local enviornment you can copy the .env.example file into a .env file which will connect the endpoints such as the `DB_NAME/DB_HOST` to your application.

A quick way to do this is run the command from within the app folder:
`````
cp .env.example .env
`````

### Pull the Dependencies to Run Sail
You may install the application's dependencies by navigating to the application's directory and executing the following command. This command uses a small Docker container containing PHP and Composer to install the application's dependencies:
`````bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
`````
Note, you will need to replace php83 with the version that is found within the docker-compose file. For example, if the version is `php-8.2` then you will need to use `php82-composer:latest`


### Default Docker Context
If you are using Docker Desktop for Linux, you should use the default Docker context by executing the following command:
`````
docker context use default
`````

#### Setting an Alias
To avoid retypping the vendor path for each execution, an alias is reccomended for running sail commands. This can be done like so:
`````
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
`````

#### (Optional) Adding a Firewall Exception
By default, your firewall will likely block port 80/8080/8000 which will prevent your application from displaying when accessing the ip externally. A workaround is to add an exception. Save the following into a bash script file like `execute.sh` and then run.

You can replace the service name with whatever you prefer:
`````
YOURPORT=8080
PERM="--permanent"
SERV="$PERM --service=laravel"

firewall-cmd $PERM --new-service=laravel
firewall-cmd $SERV --set-short="Laravel ports"
firewall-cmd $SERV --set-description="Laravel port exceptions"
firewall-cmd $SERV --add-port=$YOURPORT/tcp
firewall-cmd $PERM --add-service=laravel
firewall-cmd --zone=public --add-service=http --permanent
firewall-cmd --reload
`````
Note: if you are only running localhost on your machine and not using your ip externally, you can skip this step.


### Running the Sail Containers
Before running and building the sail containers, make sure there are no other running volumes from docker compose. Skipping this step can involve an error such as `Unable to setup unix socket lock file` when running the sail containers.

First shutdown existing volumes:
`````
docker compose down --volumes
`````
Next, build the sail containers:
`````
sail up --build -d
`````
The `-d` variable will allow the sail containers to run in the background. This is optional however in the next step we will be using bash within the containers thus you will either need to do this in a seperate terminal session or the existing one with the `-d` option.


### Bash into Sail
Run the following command to access into the sail container for the application:
`````
sail bash
`````
This will log you into the container where you will need to run a series of commands to set up the enviornment. First, you will need to generate a new key for your `.env` setup. This is the file that you copied from the sample file. Since this setup will be unique on your system, it will require a unique identifier. To this run the following command:
`````
php artisan key:generate
`````
Next, you will need to run the migration in order to populate the database with the correct schema for the application. This can be done by running the following:
`````
php artisan migrate
`````
Once that is finished, the front-end utilities will need to be installed. By default, node and npm will already be available in the container (these are included via the Docker setup). To run the installation simple run the following command.
`````
npm install
`````
This will pull of the existing dependencies listed on the .json file for the node modules. 


### Run Dev and Build
At this point you can run the production and development build commands to get started:
`````
npm run build
npm run dev
`````
