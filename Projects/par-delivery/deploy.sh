#!/bin/bash

git pull

npm install

npm run build

pm2 restart par-delivery || pm2 start npm --name 'par-delivery' -- run start

echo 'Deployment completed'

chmod u+x ./deploy.sh