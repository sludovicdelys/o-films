# Un concurrent à Allociné ?

On vous rassure, on ne va pas vous demander ca ! Par contre, vous allez devoir créer une base d'application en suivant un schema ER et un cahier des charges extremement succint.
En route !

## Instructions

Vous devez créer une application qui doit contenir:

- une page d'affichage de films
- Une page d'affichage de series
- Une page contenant un formulaire pour permettre ensuite l'ajout d'un nouveau film
- Des migrations sans gestion de FK et des données de test


## Info supplementaires

- Vous avez dans le dossier docs un schema ER que vous devez respecter au maximum lors de la création de vos migrations
- Il y a aussi un guide de style qui vous donne des pistes pour créer une interface utilisateur simple mais elegante ( on utilise la librairie bulma, on vous invite a faire de même)
- La page avec formulaire ne doit pas etre fonctionelle, elle doit juste contenir un formulaire qui servira plus tard

## Aide

- Voila les elements que vous allez avoir besoin de créer pour votre application
  - Controller
  - Model
  - Template
  - Migration
  - Seeders si vous voulez

## Bonus

- Mettre en place les FK dans les migrations
- Mettre en place les liaisons entre movie / show et country / genre dans les models
