# S4C2 Allard_Nathanaël CV

J'ai voulus crée ce Cv dans le but qu'il soit le plus modifiable possible, afin d'etre réutilisable par d'autre mais aussi avec la possibilité d'etre mit a jour rapidement et simplement.


## Fonctionalités majeurs:

* Tout le contenu texte est modifiable: une fois connecté en tant qu'administrateur vous avez accès a des bouton de modification / création / supression. ![Alt text](/mycv/tree/master/readimg/admin.PNG "Modification")
* Pour la photo de l'utilisateur, ainsi que les photo de la catagorie spotlight, les liens des photos sont enregistrer en base de donné et sont donc directement modifable vien le lien.
* La catégorie spotlight mais en avant des réalisation de manière aléatoire. ![Alt text](/mycv/tree/master/readimg/spot.PNG"Mise en avant")
* La modification de votre niveau en langue modifie la classe Css et met a jour directement le nombre de point colorié. ![Alt text](/mycv/tree/master/readimg/lang.PNG "Langues")
* Le menu renvoie a des encre sur le site et le scroll ce fait a travers une fonction javascript afin d'etre plus fluide.
* Les réalisation sont gérés dans un Isotope, soit il est possible au visiteur de trié les créations a l'aide des bouton. ![Alt text](/mycv/tree/master/readimg/tri.PNG "Tri")
* Il y a deux test , un test unitaire qui test si la class et l'Entity Experience fonctionne, et un texte fonctionnel si la base renvoie bien le nom de l'Entity personne.
* L'annotion @ApiResource est présente sour chaque entité.
* Le formulaire de contact enregistre les données sur la base de donnée.
* Le projet est selon Checkstyle conforme.
* Il et possible de ce connecter selon la méthode In_memory.





### Prerequis

Afin de se connecter au CV le lien est le [suivant](https://symphony-allardnathanael.c9users.io/my_cv/public/index.php/)

## Pour acceder a Symphony dans le projet 

```
cd my_cv
```
Puis les commandes sont accessible via la commande 

```
 php bin/console
```
## Les tests

### Ce test vérifie si l'Entity Experience fonctionne et ajoute bien les titre grace au fonction SetTitle

```
 php vendor/bin/codecept run unit ExampleTest
```
-------------------------------------------------------------------------------------------

### Ce test vérifie si il trouve mon nom et prénom Dans la page principale du CV

```
 php vendor/bin/codecept run acceptance SigninCest
```
## Admin

Appuyer sur le bouton ce connecter
* Identifiant :  admin
* Mot de passe : moi

![Alt text](/mycv/tree/master/readimg/co.PNG "Connection")

## Auteur

* **Coquil** - *Initiateur* -
* **Allard Nathanael**

## Idée d'amélioration

### Premièrement des amélioration graphique
* Un fond derriere le Header
* Les langues en lignes
* Une section compétences plus complètes avec des graphiques

### Amélioration techinque

* Mot de passe et login en base de donnée
* Les images directement modifable ( si possible ) sans passé par le projet symphony
