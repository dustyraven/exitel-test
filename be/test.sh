#!/usr/bin/env bash

phpcs --standard=PSR2 --ignore=*/vendor/* .

./vendor/bin/phpunit ./tests
