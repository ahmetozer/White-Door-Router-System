#!/bin/bash
apt-get install -y bash-completion
echo 'PermitRootLogin yes' >> /etc/ssh/sshd_config
