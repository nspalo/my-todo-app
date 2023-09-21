#!/usr/bin/env bash

set -eo pipefail

# Delete All Images
echo '####################################################'
echo 'Running docker system prune -a --force'
echo '####################################################'
docker system prune -a --force
