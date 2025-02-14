# JulesseAi

**Attention :** Le chatbot peut parfois être lent. Si vous ne recevez pas de réponse, veuillez renvoyer votre message. (Il répond souvent de manière fausser veuillez ne pas le prendre en compte)

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- PHP 
- Composer
- Symfony CLI
- Une base de données 

## Installation

### Cloner le projet

Clonez ce dépôt sur votre machine locale en utilisant la commande suivante :

```bash
git clone https://github.com/Julesse0/JulesseAi.git
cd JulesseAi
```
### Allez sur le dossier api

```bash
cd api
```
Utilisez Composer pour installer toutes les dépendances nécessaires :

```bash
composer install
```
Créez la base de données et exécutez les migrations :

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

Démarrez le serveur Symfony 
```bash
symfony serve
```

### Allez sur le dossier JulesseAi (sur un autre terminal)

```bash
cd JulesseAi
```
Utilisez Composer pour installer toutes les dépendances nécessaires :

```bash
composer install
```

Créez la base de données et exécutez les migrations :

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

Démarrez le serveur Symfony 

```bash
symfony serve
```
### Configurer les variables d'environnement (optionnel)
Copiez le fichier .env exemple et configurez-le selon vos besoins :

```bash
cp .env.example .env
```

### Lancer le projet

Si vous avez lancer le serveur Api en premier
```bash
http://127.0.0.1:8001/register
```

