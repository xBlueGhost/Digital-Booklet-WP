---
layout: post
title: "Le commencement"
description: "Il y a un commencement à tout. Voilà celui de notre projet"
tags: [commencement, intro, premières étapes]
categories: [intro]
comments: false
---

### Voila le commencement

Notre mission est de créer un plugin wordpress pour mettre le livret numérique de l'ENSICAEN au sein de leur nouveau site.

Pour cela, nous avons commencé à éditer les fichiers minimum pour "dire à wordpress" que notre programme est un plugin.

Notre projet ressemble donc à cela pour le moment:
~~~
.
+-- Digital-Booklet-WP
|   +-- index.php
|   +-- install.php
|   +-- uninstall.php
~~~

Le fichier *index.php* contient les informations pour déclarer le plugin, ainsi que la classe php pour gérer le plugin.

Le fichier *install.php* contient tout ce qui sera à installer lors de l'activation du plugin.

Le fichier *uninstall.php* contient tout ce qui sera à désinstaller lors de la suppression du plugin.

### La base de la base *index.php*

Ce fichier contient toutes les informations pour déclarer à wordpress que notre programme est un plugin. Il contient aussi les fonctions permettant d'exécuter les actions à l'installation et à la suppression du plugin.

{% highlight php %}
<?php
register_activation_hook(__FILE__, array( 'ENSICAEN_Digital_Booklet__install', 'install_db' ));
?>
{% endhighlight %}

Cette fonction permet de dire que la fonction statique *install_db* déclarée dans la classe *ENSICAEN_Digital_Booklet__install* (du fichier *install.php*) sera exécuté lors de l'activation du plugin.

{% highlight php %}
<?php
register_uninstall_hook(__FILE__, array( 'ENSICAEN_Digital_Booklet__uninstall', 'uninstall_db' ));
?>
{% endhighlight %}

Cette fonction permet de dire que la fonction statique *uninstall_db* déclarée dans la classe *ENSICAEN_Digital_Booklet__uninstall* (du fichier *uninstall.php*) sera exécuté lors de la suppression du plugin.