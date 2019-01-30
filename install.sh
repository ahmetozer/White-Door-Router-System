#!/bin/sh
  set -e
  set -x
  echo "Not available"
exit


which apt || (echo please install git ; echo aa)
which git || (echo please install git ; exit 1)

useradd -m whitedoor
adduser whitedoor sudo

cd /home/whitedoor
uname -a | grep Microsoft && wget https://github.com/AhmetOZER/White-Door-Router-System/raw/master/bash-on-windows-wsl-fix.sh
chmod 755 bash-on-windows-wsl-fix.sh
./bash-on-windows-wsl-fix.sh
git clone git://git.buildroot.net/buildroot
