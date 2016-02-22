# tqc
Total Quality Control

Utilização de conceitos do TQC para fluxo de atividades

Requisitos/Ferramentas

PHP 5.5
SQL Lite
Zend2
Angular
PHP UNIT

NODE para testes end super com Protractor

=====
Instalação

Protractor
npm install -g protractor

Selenium
webdriver-manager update

=====
Bootstrap:

Banco de dados
php public/index.php orm:generate-entities ./module/Application/src
php public/index.php orm:schema-tool:drop --force


Protactor para testes end user
webdriver-manager start
http://localhost:4444/wd/hub

PHPUNIT
D:\Programacao\git\tqc\test>..\vendor\bin\phpunit

Uteis
SET HTTP_PROXY=http://waltrick:aaap@192.168.10.254:3128
