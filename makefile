run:
	docker-compose up -d

up:
	docker-compose up

stop:
	docker-compose down

build:
	docker-compose build

pbuild:
	cd ./src && composer update

prod:
	docker-compose -f docker-compose-prod.yml up -d

sprod:
	docker-compose -f docker-compose-prod.yml up -d