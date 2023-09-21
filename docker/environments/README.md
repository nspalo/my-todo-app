# Environments Directory
- This directory contains `.env` file for environment variables

## Directory Structure
- Below is an overview of how the project directory structure would look like.
- Add / Remove / Rename according to the needs or liking or whatever make sense.
```
my-project/                       // Main Project Directory
├── docker/                       // Docker Related
│   ├── ...
│   ├── enviroments/               // Environment variables
│   │   ├── config.env             // Main config file
│   │   ├── local.env              // Local Database credentials or configs
│   │   ├── test.env               // Test/Staging Database credentials or configs
│   │   └── prod.env               // Prod Database credentials or configs
│   └── ...
└── ...
```

### config.env
- Main config

### local.env
- Local

### staging.env
- Staging

### prod.env
- Prod
