run:
	docker-compose run --rm app composer install
	cp .env.example .env
	docker-compose run --rm app php artisan slot:spin

test:
	docker-compose run --rm app ./vendor/bin/phpunit

run_container:
	docker-compose run --rm app /bin/bash


prune:
	docker system prune -a
	docker volume prune