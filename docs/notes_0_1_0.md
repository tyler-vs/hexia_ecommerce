<!-- 


notes for version 0.1.0.
===



[toc]



# forms 101 for php

- `action` attribute 

gives the form a URL or path to another program that
will sanitize and verify that data,

- `method` attr.

either 'GET' or 'POST' tells form _how_ the data will be carried.


- form input fields _must_ have name and type attrs.

# sessions and cookies

- both must be at the top of the php code and html document/page
- session_start(); function
-$_SESSION['varName'] = 0; // a session variable
- remember session expired when browser closes

# efficient code techniques


## includes

- using an `.inc` extension to the php to hint the type of file it is.. include

## use functions

- can be called anywhere within the program



# MySQL introduction


MySQL is a _relational database_ which allows the data to be broken up 
into smaller amounts of data so there is not none large cumbersome database table


- tables, fields of pertinent information
- fields, represent each bit of information
- indexes, speeds up the process of searching for a particular row of information.
- using _keys_, 
- primary key, or unique identifier that helps keep the data seperate.




# admin login

- start with session_start();


















