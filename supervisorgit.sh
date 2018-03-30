cd /var/www/html
ssh-keyscan -t rsa github.com >> ~/.ssh/known_hosts
git config --global user.email "avadhesh.m@pepperfry.com"
git config --global user.name "Avadhesh Mishra"
git pull origin master
git add .
git commit -m 'commited by ubuntu sync'
git push origin master