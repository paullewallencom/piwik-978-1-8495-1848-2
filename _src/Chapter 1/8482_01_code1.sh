grep -i 'DocumentRoot' httpd.conf
cd /var/www/
wget http://builds.piwik.org/latest.tar.gz
tar -xvwzf latest.tar.gz
rm latest.tar.gz
mv piwik NEW_FOLDER
mv -r ./piwik/* ./