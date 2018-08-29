#!/bin/sh
echo "Not available"
exit


which apt || (echo please install git ; echo aa)
which git || (echo please install git ; exit 1)

git clone git://git.buildroot.net/buildroot