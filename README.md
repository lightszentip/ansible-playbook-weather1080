# ansible-playbook-weather1080

Installation script for a weather station ws1080 or ws3000 with pywws and transfer data to mysql database

## Pre Task

* install mysql or mariadb
* change path in script - if necessary  
* Enter the mysql database connection to save-json-data.php

## Run

Use this playbook with:

```ansible-playbook ws1080.yml --extra-vars "variable_host=yourhostname" -K```


