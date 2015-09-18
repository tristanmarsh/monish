<https://github.com/tristanmarsh/monish/wiki/>
Welcome to the monish wiki!  

## Configuring Wordpress
Wordpress config files found in /.tools/

* Database and Wordpress user root, pw root
* Create and import provided database monish_wp_db.sql
* Ensure development server configured to http://localhost/monish for interoperability with WP install  

## Configuring CakePHP
Wordpress config files found in /dashboard/.tools/

* Database user root, pw root
* Create and import database monish_cake_db.sql

## Deployment
Remember, the .tools folders must never be deployed. Doing so would allow for people to just download our database, with all of it's unencrypted data, use hash tables to crack passwords and very quickly gain access to the system. Don't be a sucker.