

The setup process is easy to complete. 

1. Edit the '.php' files in this package - there is very little code, and most of it is basic HTML. 

The db.php file has the following code: 

    $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
    $DATABASE_NAME   = 'DATABASE NAME';
    $DATABASE_USER   = 'USER';
    $DATABASE_PASSWORD = 'PASS';

If you are unsure of what should go here consult with your Hosting Company.

2. Create images to replace the ones in this package.

3. In the b.php you will need to get a Google Map API code - which is free. 

4. The State Databases we provide are in SQL format. Once you create and name your database all you need to do is import this file. 
Once it is imported your database will be populated with your new Table (which will be named 'List') and Records.

6. Upload your files. 



**************************
.htaccess file

In this file you will see the following code:

Options +FollowSymLinks
RewriteEngine On
RewriteRule (.*).htm$ http://www.yourdomain.net/q.php?q=$1 

You will need to edit the last line.

With this file on your site you can use Search Friendly URLs.

So http://yoursite.com/accountants.htm will now return results