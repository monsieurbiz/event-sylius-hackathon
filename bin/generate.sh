#!/bin/bash -l

set -o errexit -o nounset -o xtrace

# Load .env.local if it exists
if [ -f .env.local ]; then
  source .env.local
fi

# GITHUB_TOKEN is not set
if [ -z "${GITHUB_TOKEN:-}" ]; then
  exit 1
fi

mdFile=$1
outputFile=$2

CONTENT=$(jq -Rs . < $mdFile)
JSON_OUTPUT="{\"text\": $CONTENT}"

curl -L \
  -X POST \
  -H "Accept: application/vnd.github+json" \
  -H "Authorization: Bearer ${GITHUB_TOKEN}" \
  -H "X-GitHub-Api-Version: 2022-11-28" \
  https://api.github.com/markdown \
  -d "$JSON_OUTPUT" \
  -o - > $outputFile
