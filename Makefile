.RECIPEPREFIX +=
.DEFAULT_GOAL := help
sail := vendor/bin/sail

help:
	@echo "welcome to IT Support"

install:
	@composer install

test:
	php artisan test 

CleanTest:
	php artisan test && rm -rf storage/tenant* &&  rm -rf storage/app/*

fresh: 
	rm -rf storage/tenant* && rm -rf storage/app/*  && php artisan migrate:fresh --seed &&	chmod -R 777 storage && php artisan storage:link

clear: 
	php artisan cache:clear && php artisan config:clear &&  php artisan config:clear &&  composer dump-autoload -o && php artisan view:clear 

clearfiles: 
	rm -rf storage/tenant* &&  rm -rf storage/app/*