#!/bin/bash
netstat -i | cut -d ' ' -f1 | tail -n +3 |  while IFS= read -r line ;do
echo '<iframe src=''"/bandwith/index.php?interface='"$line"'"' 'class="interfacesliveupdate"></iframe>' ;done