plate-forme de maintenance d’une infrastructure qui permet aux usagers de cette infrastructure de signaler des anomalies de la façon la plus simples et la plus e ﬃ cace possible c’est à dire juste en flashant un QR-Code de l’élément d’infrastructure défaillant (éclairage d’une salle, distributeur de fournitures sanitaires(savon, essuie-main, etc), …) la plate-forme redirige l’usager vers un rapport d’anomalie formulaire qui rappelle la description et la localisation de la ressource ( aﬁn que l’usager puisse vériﬁer que le code ﬂashé correspond à la bonne ressource) et propose une liste d’anomalies déjà saisies par d’autres utilisateurs ainsi qu’un champs de saisie pour créer une nouvelle anomalie.  
  
## - Déploiement de l’application:  
  
1. Copiez le dossier du projet dans le dossier « /var/www/html/ ».  
  
2. Activez le mod_rewrite d’apache2 pour gérer la ré-écriture d’URL.  
(commande :  #sudo a2enmod rewrite.)  
  
3. Modifiez le fichier de configuration d’apache2 ‘/etc/apache2/apache2.conf’.  
-- Définir le AllowOverride du <Directory /var/www/ en All.  
  
4. Redémarrez le serveur apache2.  
  
5. Configurez les constantes des DB dans le fichier /urouen.fr/app/body/database,php pour la base de données.  
(Vous trouverez le fichier testprojetlw1.sql qui contient le modèle de la base de données utiliser dans l’archive.)  
  
## fonctionnalités de l’application :  
  
* L’application distingue trois rôles :  
  * L’administrateur (unique) de la plate-forme : il peut lister, ajouter et supprimer
les comptes des responsables de maintenance ;  
  * Les responsables de maintenance. Ils peuvent lister, ajouter et supprimer des
ressources, lister les tickets d’anomalie et fermer ces derniers lorsque la
maintenance a été réalisée. Un responsable de maintenance ne peut intervenir ni
voir les ressources ou tickets d’anomalie d’un autre responsable.  
  * Les utilisateurs anonymes ou usagers. Ils peuvent remplir un rapport d’anomalie
en se rendant à l’URL associée à une ressource.  
* Une ressource est associée à  
  * une courte description,  
  * une localisation (ex : salle U2.2.2, toilette 2e étage,...),  
  * un responsable de maintenance,  
  * une liste d’anomalie déjà saisie.  
* Chaque ressource est associée à une URL (concise) donnant accès à son formulaire
de rapport d’anomalie. Un formulaire de rapport d’anomalie rappelle la description
et la localisation de la ressource ( aﬁn que l’usager puisse vériﬁer que le code ﬂashé
correspond à la bonne ressource) et propose une liste d’anomalies déjà saisies par
d’autres utilisateurs ainsi qu’un champs de saisie pour créer une nouvelle anomalie.
* Pour chaque ressource il est possible d’imprimer une étiquette comportant un texte
("Flashez-moi pour rapporter un problème"), un QR-code encodant l’URL associée à
la ressource, et... l’URL de la ressource pour les gens ne disposant pas d’un terminal
mobile capable de ﬂasher un QR-Code. L’étiquette à une dimension de 105 × 42
millimètres une fois imprimée. L’impression se fait depuis un rendu Web (HTML)
sans générer de PDF.  
* Le formulaire de rapport d’anomalie s’a ﬃ che correctement et de façon ergonomique
sur un ordi-phone ou une tablette.