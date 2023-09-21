#!/usr/bin/env bash

set -eo pipefail

./scripts/run.sh \
  artisan \
  ${@}
