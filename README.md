# My To-Do App
> A simple to-do list web application built with laravel

![CI BUILD](https://github.com/nspalo/my-todo-app/actions/workflows/ci-build.yml/badge.svg)

## Directory Structure
- Below is an overview of how the project directory structure would look like.
- Add / Remove / Rename according to the needs or liking or whatever make sense.
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
│   ├── composer.sh                // Run composer and its command
│   ├── prune.sh                   // Remove all images, run with care!
│   └── *.sh
├── src/                           // Project source code here...
│   └── public/                    // temporary directory just for initial set up
│       └── index.php              // default file just to make sure things work, shows phpinfo
├──────────────────────────────────────────────────────────────────────────────────────────────
│       Or have a separete the source directory code for frontend and backend,
│       instead of just src/ to hold all the code. The structure below could be use.
├──────────────────────────────────────────────────────────────────────────────────────────────
├── frontend(-src)/                // Front-end source code only
└── backend(-src)/                 // Back-end source code only
```
