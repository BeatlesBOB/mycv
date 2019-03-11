# S4C2 Allard_Nathanaël CV

J'ai voulu créer ce CV dans le but qu'il soit le plus modifiable possible, afin d'être réutilisable par d'autres, mais aussi avec la possibilité d'être mis à jour rapidement et simplement.


## Fonctionalités majeurs:

* Tout le contenu texte est modifiable: une fois connecté en tant qu'administrateur vous avez accès à des boutons de modification / création / supression.![Alt text](/readimg/admin.PNG "Modification")
* Pour la photo de l'utilisateur, ainsi que les photos de la catégorie spotlight, les liens des photos sont enregistrées en base de donnée et sont donc directement modifable via le lien.
* La catégorie spotlight met en avant des réalisations de manière aléatoire.![Alt text](/readimg/spot.PNG "Mise en avant")
* La modification de votre niveau en langue modifie la classe CSS et met à jour directement le nombre de points coloriés. ![Alt text](/readimg/lang.PNG "Langues")
* Le menu renvoie à des ancres sur le site et le scroll se fait à travers une fonction javascript afin d'être plus fluide.
* Les réalisations sont gérées dans un Isotope, soit il est possible au visiteur de trier les créations à l'aide des boutons. ![Alt text](/readimg//tri.PNG "Tri")
* Il y a deux test, un test unitaire qui test si 'Entity Experience' fonctionne, et un texte fonctionnel si la base renvoie bien le nom de 'Entity personne'.
* L'annotion @ApiRessource est présente sur chaque entité. ![Alt text](/readimg/api.PNG "Modification")
* Le formulaire de contact enregistre les données sur la base de donnée.
* Le projet est selon un Checkstyle conforme.
* Il est possible de se connecter selon la méthode In_memory.
* Le site est responsive.

### Prerequis

Afin de se connecter au CV, le lien est le [suivant](https://symphony-allardnathanael.c9users.io/my_cv/public/index.php/)

## Installation

Crée un dossier my_cv puis glisser les éléments à l'intérieur.

```
cd my_cv
```
Puis les commandes sont accessibles via la commande 

```
 php bin/console
```
## Les tests

### Ce test vérifie si 'Entity Experience' fonctionne et ajoute bien les titres grâce à la fonction SetTitle

```
 php vendor/bin/codecept run unit ExampleTest
```
![Alt text](/readimg/assertion.PNG "assertion")
-------------------------------------------------------------------------------------------

### Ce test vérifie si il trouve mon nom et prénom dans la page principale du CV

```
 php vendor/bin/codecept run acceptance SigninCest
```
![Alt text](/readimg/accept.PNG "acceptance")

## Admin

Appuyer sur le bouton se connecter
* Identifiant :  admin
* Mot de passe : moi

![Alt text](/readimg/admin.PNG "Connection")

## Auteur

* **Coquil** - *Initiateur* -
* **Allard Nathanael**

## Idée d'amélioration

### Premièrement des améliorations graphiques

* Les langues en lignes
* Une section compétences plus complètes avec des graphiques

### Améliorations techniques

* Mot de passe et login en base de donnée
* Les images directement modifables ( si possible ) sans passer par le projet symfony
* Le bouton Voir le projet ne marche pas
