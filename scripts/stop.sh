#!/usr/bin/env bash

set -eo pipefail

./scripts/main-docker-compose.sh \
  stop \
  ${@}
