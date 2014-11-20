Documents de rentrée
=========

Projet Framework/PHP de 3ème année, il s'agit de faire une interface de chargement de documents de rentrée pour les nouveaux élèves: 
- Vérification des personnes autoriser à voir les documents
- Récupération d'information supplémentaire
- Pannel administrateur pour gérer facilement les documents et les informations sur les élèves


Prérequis
----

- Serveur Apache
- MySQL

Installation
----

### Installation pour Linux:

- Vous pouver charger l'archive ici: https://github.com/artentica/ent_rentree/archive/master.zip
```sh
    wget https://github.com/artentica/ent_rentree/archive/master.zip
```
- Si "unzip" n'est pas installé sur votre ordinateur, installez le
```sh
    sudo apt-get update
    sudo apt-get install unzip
```
- Décompresser l'archive "ent_rentree-master.zip"  
```sh
    unzip ent_rentree-master.zip
```
- Copiez le dossier que "ent_rentree-master" contient, "rentree", et collez le dans le répertoire /var/www/
```sh
    sudo mv -R ent_rentree-master/ /var/www/
```
- Lancez le serveur web apache
```sh
    /etc/init.d/apache2 restart
```
- Installer la base de données, le fichier sql se trouve dans "rentree/doc/"

### Installation pour Windows:
- Vous pouver charger l'archive ici: https://github.com/artentica/ent_rentree/archive/master.zip
- Décompressez l'archive
- Copiez le dossier que "ent_rentree-master" contient, "rentree", et collez le dans le répertoire "www" de WAMP si c'est celui que vous utilisez
- Lancez WAMP
- Installer la base de données, le fichier sql se trouve dans "rentree/doc/" 

 
Modification de la configuration
----
- Vous n'avez que le fichier "conf.php" à modifier. Il se trouve dans "rentree/lib/"
