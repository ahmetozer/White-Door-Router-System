#!/bin/bash
  set -e
  set -x
  echo "İnstaling wh-explorer and wh-write function"
cat <<EOF >> .bashrc 
function wh-explorer() {
  if [ $(pwd | sed -n -e 's!^/mnt/!!p' | wc -c) == 0 ]
  then
    /mnt/c/Windows/System32/cmd.exe /c "echo %LOCALAPPDATA%" > /tmp/LOCALAPPDATA
    dest="$(strings -a /tmp/LOCALAPPDATA)\\Packages"
    /mnt/c/Windows/System32/cmd.exe /c "dir $dest | findstr CanonicalGroupLimited" > /tmp/Canonical
    repo=$(strings -a /tmp/Canonical | awk '{print $NF}')
    root=$(echo "$dest\\$repo\\LocalState\\rootfs")
    /mnt/c/Windows/explorer.exe $(echo ${root}$(pwd | sed 's!/!\\!g'))
  else
    /mnt/c/Windows/explorer.exe $(pwd | sed -e 's!/mnt/!!g' -e 's!/!\\!g' -e 's/\(.\)\(.*\)/\1:\2/g')
  fi
}
function wh-write() {
  if [ $(pwd | sed -n -e 's!^/mnt/!!p' | wc -c) == 0 ]
  then
    /mnt/c/Windows/System32/cmd.exe /c "echo %LOCALAPPDATA%" > /tmp/LOCALAPPDATA
    dest="$(strings -a /tmp/LOCALAPPDATA)\\Packages"
    /mnt/c/Windows/System32/cmd.exe /c "dir $dest | findstr CanonicalGroupLimited" > /tmp/Canonical
    repo=$(strings -a /tmp/Canonical | awk '{print $NF}')
    root=$(echo "$dest\\$repo\\LocalState\\rootfs")
    /mnt/c/Program\ Files\ \(x86\)/ImageWriter/Win32DiskImager.exe $(echo ${root}$(pwd | sed 's!/!\\!g'))/output/images/sdcard.img
  else
    /mnt/c/Program\ Files\ \(x86\)/ImageWriter/Win32DiskImager.exe $(pwd | sed -e 's!/mnt/!!g' -e 's!/!\\!g' -e 's/\(.\)\(.*\)/\1:\2/g')/output/images/sdcard.img
  fi
}
EOF
 echo "cd /home/whitedoor"
 cd /home/whitedoor
 echo "Fakeroot-Tcp installing"
 mkdir backup
 mv /home/whitedoor/build/output/host/bin/fakeroot backup/
 cp /usr/bin/fakeroot-tcp /home/whitedoor/build/output/host/bin/fakeroot
 echo "Windows fix done"
