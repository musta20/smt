.RECIPEPREFIX +=
.DEFAULT_GOAL := help
sail := vendor/bin/sail

help:
	@echo "welcome to IT Support"

install:
	@composer install

test:
	$(sail) artisan test

fresh: 
	$(sail) artisan migrate:fresh --seed

clear: 
	$(sail) artisan config:cache &&  $(sail) artisan config:clear &&  composer dump-autoload -o

clearfiles: 
	rm -rf storage/tenant* &&  rm -rf storage/app/*