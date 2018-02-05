#!/bin/bash
if [-f /drouter.readme]
then
  echo 'system already installed'
else
  #system backup
  mkdir -p /drouter/backup
  cp /etc/pam.d/ssh /drouter/backup/
  cp /etc/ssh/sshd_config /drouter/backup/
  cp /etc/fstab /drouter/backup
  #Files installing
  echo "tmpfs       /var/log/nginx tmpfs   nodev,nosuid,noexec,nodiratime,size=1M   0 0" >> /etc/fstab
  echo "tmpfs       /var/log/ tmpfs   nodev,nosuid,noexec,nodiratime,size=5M   0 0" >> /etc/fstab
  cp debian/* /
  #Services restart
  service ssh restart
