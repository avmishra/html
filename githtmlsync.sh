cd /var/www/html
sleep 600
git pull origin master
git add .
git commit -m 'commited by ubuntu sync'
git push origin master