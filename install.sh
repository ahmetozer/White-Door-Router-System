#!/bin/bash
if [-f /drouter.readme]
then
  echo 'system already installed'
else
  #Remove log Files
  rm -rf /var/log/*
  mkdir -p /var/log/nginx
  #system backup
  mkdir -p /drouter/backup/etc/ssh
  mkdir -p /drouter/backup/etc/pam.d
  mkdir -p /drouter/backup/etc/nginx
  cp /etc/pam.d/ssh /drouter/backup/
  cp /etc/ssh/sshd_config /drouter/backup/
  cp /etc/fstab /drouter/backup
  mv /etc/nginx/* /drouter/backup/etc/nginx/
  #Files installing
  echo "tmpfs       /var/log/nginx tmpfs   nodev,nosuid,noexec,nodiratime,size=1M   0 0" >> /etc/fstab
  echo "tmpfs       /var/log/ tmpfs   nodev,nosuid,noexec,nodiratime,size=5M   0 0" >> /etc/fstab
  cp debian/* /
  #Update repostory and Installing programs
  apt-get update && apt-get install nginx-light dnsmasq php7.0-fpm --no-install-recommends -y
  #Services restart
  service ssh restart
fi
