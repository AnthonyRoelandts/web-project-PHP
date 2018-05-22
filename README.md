To configure the database connection, your Apache config file has to be modified (it should be at wamp64\bin\apache\apache2.4.33\conf\extra\httpd-vhosts.conf). Inside the VirtualHost tag, add the following lines (and replace the third word of each line by the appropriate value):

```
SetEnv MYSQL_HOST localhost
SetEnv MYSQL_USER root
SetEnv MYSQL_PWD pass
SetEnv MYSQL_DB projetweb
SetEnv MYSQL_PORT 3306
```
