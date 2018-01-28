# Prérequis

Node.JS, Composer, PhpMyAdmin, MySQL, Php7

# Installation

git clone https://github.com/Master-S2I-Corti/project-master.git

Aller sur PhpMyAdmin : localhost/phpMyAdmin
Creer une base de donnée : projet
Executer le fichier Projer.sql dans phpMyAdmin
Exécuter:
 CREATE USER 'projet-master'@'localhost' IDENTIFIED BY 'dptinfo';
 GRANT ALL PRIVILEGES ON projet TO 'projet-master'@'localhost';

Aller sur le site localhost/public/register
