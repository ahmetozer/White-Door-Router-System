#!/bin/bash
set -e

cp -r board/bananapi-m1/* buildroot/

cd buildroot

make
