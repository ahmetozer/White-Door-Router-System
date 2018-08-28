rm -rf  /var/log/*
rm -rf  /run/log/*

echo "tmpfs /var/log tmpfs defaults,noatime,nosuid,nodev,noexec,mode=1777,size=12M 0 0
tmpfs /run/log tmpfs defaults,noatime,nosuid,nodev,noexec,mode=1777,size=12M 0 0
tmpfs /var/tmp tmpfs defaults,noatime,nosuid,nodev,noexec,mode=1777,size=12M 0 0" >>  /etc/fstab

apt install --no-install-recommends dnsmasq nodejs ca-certificates
