cd /var/www/html
ssh-keyscan -t rsa github.com >> ~/.ssh/known_hosts
git config user.email "avadhesh.mishra@gmail.com"
git config user.name "Avadhesh Mishra"
git pull origin master
git add .
git commit -m 'commited by ubuntu sync'
git push origin master