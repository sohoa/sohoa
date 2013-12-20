Framework sohoa
=====

Installation
-----

Pour installer sohoa il a rien de plus simple avec [composer](http://getcomposer.org/doc/00-intro.md#locally)
il vous suffit d'executer la commande suivante
```BASH
composer create-project -s dev sohoa/sohoa myProject
```

Utiliser sohoa sur votre serveur web
-----

Nous avons adoptez l'architecture de fichiers suivante
* Application
    * Controller
    * Config (Ce dossier contient les fichiers propres à votre application (Route , Environnement , …)
    * Model
    * View
    * …
* Public
    * Css
    * …

Nous allons faire pointer notre nom de domaine http://foo.hoa par exemple vers le dossier Public au moyen d'un
[vhost](http://hoa-project.net/Literature/Learn/Appendix_http_servers.html#Hote_virtuel_avec_VirtualHost)

```
<VirtualHost *:80>
  ServerName foo.hoa

  DocumentRoot "/path/to/my/sohoa/app/Public"

  <Directory "/path/to/my/sohoa/app/Public">
    Options All
    AllowOverride All
  </Directory>

</VirtualHost>
```

Routeur
-----

Environnement
-----

Greut (Le système de vue par [Yoan Blanc](https://github.com/greut/template))
-----

Pour utiliser le système de vue il faut le déclarer dans notre fichier Public/index.php
avec ainsi :
```PHP
$framework       = new /Sohoa/Framework/Framework();
$framework->view = new /Sohoa/Framework/View/Greut();
$framework->run();
```

et dans le controller Application/Controller/Main.php
```PHP
public function IndexAction(){
    $this->greut->render(); // Cette action va automatiquement allez chercher la vue ./Application/View/Main/Index.tpl.php
}
```

la méthode render() peut prendre deux types de données en paramètre
```PHP
$this->greut->render(array('myControllerName' , 'myActionName')); // ./Application/View/myControllerName/myActionName.tpl.php
```
ainsi que
```PHP
$this->greut->render('/an/path/to/the/view.tpl.php');
```

##### Les données avec greut

Nous avons un mécanisme assez simple pour la gestion des données variables dans Greut ainsi dans le controlleur si l'on définie la variable
```PHP
$this->data->foo = 'bar';
```

Nous pourrons y acceder dans la vue associée via
```PHP
echo $foo; // qui retournera bar
```

Glossaire
-----

##### Kit
Les kits sont des classes qui apporte un lot de fontion génériques a une classe données exemple la gestion des redirections etc …,
mais cela peut être pour des données métiers exemple : la gestion des authorisations d'accès etc …

##### Helpers
Les helpers sont des fonctions regroupées autour d'un thème (catégorie) communes pour permettre d'ajouter des usages/fonctionnalités au
système de vue Greut, ainsi on peut avoir le helper suivant dans le fichier ./Application/View/Main/Index.tpl.php :
```PHP
$this->router->unroute('root'); // va générer "/"
$this->html->a('root' , [] , 'foo' , 'bar') // Pourrait générer <a href="/" class="foo">bar</a>
```

##### Services
Un services est une classe php classique que l'on instancie et que l'on rend disponnible à l'ensemble de notre application
on reproduit le principe du Design Pattern [singleton](http://fr.wikipedia.org/wiki/Singleton_%28patron_de_conception%29)

Tests
-----

##### Tests unitaires

Nous utilisons des tests unitaires fait avec [atoum](http://docs.atoum.org/fr/#Composer) et les executons avec
```
php vendor/bin/atoum -d Tests/Unit/Classes/
````

Nous utilisons également travis pour gerer la compatibilité avec toutes les verions php (5.3 5.4 5.5) et aider a la refactorisation et la gestion des PR.

##### Tests fonctionnels

Nous utilisons avec sohoa/sohoa des tests [fonctionnels](https://github.com/sohoa/sohoa/blob/master/Tests/Functionnal/application.js)

Contribution
-----
