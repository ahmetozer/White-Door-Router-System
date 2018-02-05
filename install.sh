#!/bin/bash
echo "tmpfs       /var/log/nginx tmpfs   nodev,nosuid,noexec,nodiratime,size=1M   0 0" >> /etc/fstab
echo "tmpfs       /var/log/ tmpfs   nodev,nosuid,noexec,nodiratime,size=5M   0 0" >> /etc/fstab