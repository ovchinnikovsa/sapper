run:
	docker-compose up -d

up:
	docker-compose up

stop:
	docker-compose down

build:
	docker-compose build

prod:
	docker-compose -f docker-compose-prod.yml up -d