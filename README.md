ClubManager
===========

A Symfony project created on August 7, 2015, 2:17 pm.

Use Symfony 2.7.*

It's a software to manage your sport club (player, team, event...)

---
##Get dependency : 

-> Clone git repository.
-> Update lib dependency with composer.
 ```
 php composer.phar update
 ```
 more information about composer in : https://getcomposer.org/

---
##How to generate database
to build database use : 
```
php app/console doctrine:database:create
```
next generate tables : 
```
php app/console doctrine:schema:update --force
```
Add testdata on database : 
```
php app/console doctrine:fixtures:load
```
