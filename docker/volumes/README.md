# Volumes Directory
- This directory will be linked to the docker image and host the data for the database

## Directory Structure
  - Inside this directory should be the name of the database then inside of that should be the name_version
    - Format: `<database>/<database>_<version>`
    - Example: `mysql/mysql_5.6/`

```
my-project/                        // Main Project Directory
├── docker/                        // Docker Related
│   ├── ...
│   ├── volumes/                   // Volumes Dir - Data persistence
│   │   ├── <database>/
│   │   │   └── <database>_<version>/
│   │   ├── mysql/
│   │   │   ├── mysql_5.6
│   │   │   └── mysql_7.0
│   │   ├── pgsql/
│   │   │   └── pgsql_<version>
│   │   ├── mariadb/
│   │   │   └── mariadb_<version>
│   │   ├── mssql/
│   │   │   └── mssql_<version>
│   │   ├── mongodb/
│   │   │   └── mongodb_<version>
│   │   ├── oracle/
│   │   │   └── oracle_<version>
│   │   └── logs/
│   │       ├── nginx/
│   │       └── php/
│   └── ...
└── ...
```
