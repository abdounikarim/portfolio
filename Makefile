BLACKFIRE = $(EXEC) blackfire
COMPOSER = composer
CONSOLE	= $(PHP) bin/console
DOCKER-COMPOSE = docker-compose
EXEC = docker exec -it
PHP = $(EXEC) php
TESTS = $(PHP) bin/phpunit
YARN = $(PHP) yarn

# Blackfire
.PHONY: blackfire

blackfire:				## Run blackfire
						$(BLACKFIRE) blackfire curl http://nginx/$(url)

# Composer commands
.PHONY: install update

install:				## Install Composer Dependencies
						$(COMPOSER) install

update:					## Update Composer Dependencies
						$(COMPOSER) update

remove:					## Remove Composer Dependency
						$(COMPOSER) remove $(dep)

# Docker commands
.PHONY: build up start stop

build:					## Build images
						$(DOCKER-COMPOSE) build --force-rm --no-cache --pull

up:						## Build containers and launch them in detach mode
						$(DOCKER-COMPOSE) up -d

start: 					## Start containers
						$(DOCKER-COMPOSE) start

stop: 					## Stop containers
						$(DOCKER-COMPOSE) stop

# Symfony
.PHONY: cc

cc:						## Clear the Symfony cache
						$(CONSOLE) cache:clear

# Tests
.PHONY: coverage tests

coverage:				## Run the tests with the Code coverage report
						$(TESTS) --coverage-html var/data

tests:					## Run the tests
						$(TESTS)

# Yarn
.PHONY: yarn-build yarn-install yarn-watch

yarn-build:				## Build dependencies for the prod
						$(YARN) build

yarn-install:			## Install yarn dependencies
						$(YARN) install

yarn-watch:				## Build dependencies for the dev
						$(YARN) watch

# Help
.PHONY: help

help:					## Display help
						@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-20s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

.DEFAULT_GOAL := 	help
