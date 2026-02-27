@echo off
del log.txt 2>nul
vendor\bin\phpunit ./Tests > log.txt
run log.txt
