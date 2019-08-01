.SILENT:
.DEFAULT_GOAL: demo
.PHONY: demo

demo:
	composer install
	php bin/console d:d:c
	php bin/console d:m:m -n
	php bin/console d:f:l --append
	php bin/console s:r
