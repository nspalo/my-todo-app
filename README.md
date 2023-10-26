# My To-Do App
> A simple to-do list web application built with laravel 8, Vue.js 3, and Tailwind CSS

![CI BUILD](https://github.com/nspalo/my-todo-app/actions/workflows/ci-build.yml/badge.svg)

## Directory Structure
- Below is an overview of the project directory structure.
```
my-project/                        // Main Project Directory
├── docker/                        // Docker Related
│   ├── containers/                // Service Containers
│   │   ├── nginx/
│   │   │   ├── conf.d
│   │   │   │   └── default.conf   // nginx config
│   │   │   └── Dockerfile
│   │   ├── php/
│   │   │   ├── config             // PHP Configurations
│   │   │   │   └── php-local.ini  // local development configuration
│   │   │   │   └── php-test.ini   // test/staging configuration
│   │   │   │   └── php-prod.ini   // production specific configuration
│   │   │   └── Dockerfile
│   │   ├── mysql/
│   │   │   └── Dockerfile
│   │   └── composer/
│   │       └── Dockerfile
│   ├── enviroments/               // Environment variables
│   │   ├── config.env             // Main config file
│   │   ├── local.env              // Local development
│   │   ├── test.env
│   │   └── prod.env
│   ├── volumes/                   // Volumes Dir - Data persistence
│   │   ├── mysql/                 // Database
│   │   │   └── mysql_<version>    // Specific database version
│   │   └── logs/
│   │       ├── nginx/
│   │       └── php/
│   └── docker-compose.yml         // Main Docker compose file
├── scripts/                       // This should contains all *.sh files 
│   ├── main-docker-compose.sh     // Main script that executes the base docker commands
│   ├── build.sh                   // Build the docker images 
│   ├── up.sh                      // Start the service
│   ├── down.sh                    // Tear down routine
│   ├── stop.sh                    // Stop running service
│   ├── run.sh                     // Run a specific container
│   ├── exec.sh                    // Run command inside a container
│   ├── composer.sh                // Run composer related commands
│   ├── npm.sh                     // Run npm(node) related commands
│   ├── prune.sh                   // Remove all images, run with care!
│   └── *.sh
└── src/                           // Project source code here...
    ├──────────────────────────────────────────────────────────────────────────────────────────
    │ My To-Do App codes - Laravel 8, Vue.Js 3, Tailwind CSS, PHP 8.1, MySQL 5.7
    ├──────────────────────────────────────────────────────────────────────────────────────────
    ├── app/
    ├── ...
    └── README.md
```

## Service containers
> <b>Note:</b>  
> Check `docker/environment/config.env` for configuration.  
> For environment specific configurations check `local.env`, `test.env`, and `prod.env` files

Building, Running, Stopping, Removing images and service containers  
- To make running of commands easy, a few scripts was prepared.
  - See: `scripts/` directory for more info.

```
// Building the images
> ./scripts/build.sh

// Starting the services/containers
> ./scripts/up.sh

// optionally add the -d (detach) flag to run in the background
> ./scripts/up.sh -d

// Or do a one-liner command for the build and start process
> ./scripts/up.sh -d --build

// Stopping the services/containers
> ./scripts/stop.sh

// Add the name to stop a specific service/container
> ./scripts/stop.sh <ContainerName>

// Bringing down the services
> ./scripts/down.sh

// Add the -v flag to remove the images
> ./scripts/down.sh -v
```

## Packages and Dependencies
```
// Composer installation and related commands
> ./scripts/composer.sh install
> ./scripts/composer.sh dump-autoload

// Node installation and related commands
> ./scripts/run.sh npm install
> ./scripts/run.sh npm run build
```

## Host file
Optionally, update the host file
```
# Local Dev
172.0.0.1 my-todo.local
```

## Accessing the site
Hit the browser at `localhost` or `my-todo.local`(if host file was updated).

----

> ### Note:
> - This is just a pet project
> - Development is only free time (some free time after work and weekends)
> - Might take sometime to complete (don't know when)
> - Originally planned to make it a basic CRUD for task/to-do items just to learn Vue but decided
> to make it a simple app with user registration/login and user task management.

### Functionalities / Features
- Current
  - [X] Basic CRUD for task management
  - [X] Api endpoints
  - [X] Use of Services, Repository, Trait, Enums, Resource / DTO
  - [X] Use Vue.js 3, Tailwind CSS
- Goal
  - [ ] Basic CRUD for User management
  - [ ] User Roles & Permissions
  - [ ] User Task management
  - [ ] Dashboard with Charts and/or Tables for User Task data
