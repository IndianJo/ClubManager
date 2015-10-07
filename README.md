ClubManager
===========

A Symfony project created on August 7, 2015, 2:17 pm.

Use Symfony 2.7.*

It's a software to manage your sport club (player, team, event...)
##Get composer
```
curl -sS https://getcomposer.org/installer | php
```
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
Import data : 
import data from [dump folder](https://github.com/IndianJo/ClubManager/tree/master/dump)

```
shell> mysql < dump.sql
```
more information about this command https://dev.mysql.com/doc/refman/5.6/en/reloading-sql-format-dumps.html
