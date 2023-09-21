# Containers Directory
- This directory will host all docker container related files

## Directory Structure
- Below is an overview of how the project directory structure would look like.
- Add / Remove / Rename according to the needs or liking or whatever make sense.
```
my-project/                       // Main Project Directory
├── docker/                       // Docker Related
│   ├── containers/               // Service Containers
│   │   ├── nginx/
│   │   │   ├── conf.d
│   │   │   │   └── default.conf  // nginx config
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
│   └── ...
└── ...
```
