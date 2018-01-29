# Explication du projet 
Dans le cadre d’un projet « étudiant » en Master 1 S2I, nous devons réaliser un site web d’aide à la gestion des départements de l’université. Nous avons déjà réalisé les maquettes du site. 
<ul>
Le site est décomposé en 7 interfaces qui sont les suivantes :
 <li><strong>Une interface de connexion</strong></li>
 <li><strong>Une interface de gestion des professeurs et étudiants :</strong> un professeur aura la possibilité de modifier sa propre fiche et les élèves auront juste un accès en lecture.</li>
 <li><strong>Une interface pour la gestion des notes : </strong>le professeur choisi sa classe puis il peut ensuite choisir les modules pour lesquels il enseigne et renseigner les notes de l’élève sélectionné.</li>
 <li><strong>Une interface de gestion des salles accessible pour le chef de filière et l’administrateur :</strong> le chef de filière pourra choisir une salle et y affecter le nombre d’heures pour une UE qui aura lieu dans cette salle. L’administrateur, lui, pourra créer les salles et y ajouter le nombre de places disponibles par salle ainsi que le nombre de pc et les logiciels installés sur chaque poste.</li>
 <li><strong>Une interface de création des filières : </strong>accessible par l’administrateur en lecture et écriture. Cette interface permet d’ajouter des filières pour chaque composante. </li>
 <li><strong>Une interface pour la création et l’affichage de maquette des filières : </strong>accessibles en écriture et lecture par le chef de filière et pour les autres ils auront un accès uniquement en lecture. </li>
 <li><strong>Une interface de gestion des emplois du temps : </strong>l’administrateur et le chef de filière pourront organiser les emplois du temps de chaque professeur et de chaque classe. Les professeurs et les élèves auront quant à eux un accès en lecture.</li>
</ul>
<ul> 
 Il y a donc 4 accès différents :
 <li><strong>L’administrateur : </strong>il aura accès à tout.</li>
 <li><strong>Le chef de filière : </strong>il pourra accéder et modifier toutes les parties associées à sa filière.</li>
 <li><stong>Le professeur : </strong>il aura un accès en lecture sauf pour sa fiche personnelle et les notes de ses étudiants qu’il pourra modifier.</li>
 <li><strong>L’élève : </strong>il aura accès en lecture à la liste des professeurs et des étudiants. Il pourra également accéder à ses notes et à son emploi du temps.</li>

# Prérequis

Node.JS, Composer, PhpMyAdmin, MySQL, Php7

# Installation

git clone https://github.com/Master-S2I-Corti/project-master.git

 - Aller sur PhpMyAdmin : localhost/phpMyAdmin <br />
 - Creer une base de donnée : projet <br />
 - Executer le fichier Projer.sql dans phpMyAdmin <br />
 - Exécuter:<br />
    CREATE USER 'projet-master'@'localhost' IDENTIFIED BY 'dptinfo';<br />
    GRANT ALL PRIVILEGES ON projet TO 'projet-master'@'localhost';<br />

Aller sur le site localhost/public/register<br />


