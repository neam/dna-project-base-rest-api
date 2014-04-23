#!/bin/bash

set -x

# install s3cmd 1.1.0-beta3 (manual install: http://sourceforge.net/projects/s3tools/files/s3cmd/1.1.0-beta3/s3cmd-1.1.0-beta3.zip/download)
wget -O- -q http://s3tools.org/repo/deb-all/stable/s3tools.key | sudo apt-key add -
sudo wget -O/etc/apt/sources.list.d/s3tools.list http://s3tools.org/repo/deb-all/stable/s3tools.list
sudo apt-get update && sudo apt-get install -y -q s3cmd

exit 0