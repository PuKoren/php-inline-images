.PHONY: tests
lint:
	php -l src/autoload.php
tests:
	make lint
	make cover
cover:
	phpunit --coverage-clover coverage.xml --coverage-html coverage/html
