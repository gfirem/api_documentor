#!/usr/bin/env bash
rm -rf doc
mkdir -p doc
apidoc -i ../../../plugins/acart/classes/api/ -o doc/ -t jam3