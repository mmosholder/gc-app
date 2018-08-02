#!/usr/bin/env bash

# download minio
if [ ! -e "/usr/local/bin/minio" ]; then
  cd /usr/local/bin/
  wget https://dl.minio.io/server/minio/release/linux-amd64/minio
fi

# setup configs
cp -f /var/www/vagrant/files/etc/init.d/minio /etc/init.d/minio
mkdir -p "/etc/minio"
cp -f /var/www/vagrant/files/etc/minio/config.json /etc/minio/config.json
cp -rf /var/www/vagrant/files/etc/minio/certs /etc/minio/certs
touch /var/log/minio

# ensure everything is accessible
chown vagrant:vagrant /etc/minio -R
chown vagrant:vagrant /var/log/minio
chmod +x /usr/local/bin/minio
chmod +x /etc/init.d/minio

# start on boot
update-rc.d minio defaults
update-rc.d minio enable

# start now
service minio start
