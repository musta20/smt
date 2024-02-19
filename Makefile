.RECIPEPREFIX +=
.DEFAULT_GOAL := help
sail := vendor/bin/sail

help:
	@echo "welcome to IT Support"

install:
	@composer install

test:
	php artisan test

fresh: 
	rm -rf storage/tenant* &&  
	rm -rf storage/app/* && 
	php artisan migrate:fresh --seed &&
	chmod -R 777 storage
	php artisan storage:link

clear: 
	$(sail) artisan config:cache &&  $(sail) artisan config:clear &&  composer dump-autoload -o

clearfiles: 
	rm -rf storage/tenant* &&  rm -rf storage/app/*