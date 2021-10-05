# Assignment 5 - REST API
--- 
REST is a set of architectural constraints. When a client makes a request via REST it uses a verb to tell the REST API what it wants. The verb can be GET, POST, UPDATE and DELETE. There are more verbs that can be used but these 4 verbs are used for this assignment. The server that handles the request, by using REST, is then executing operations, depending on what the request was, and can also communicate with a database to get what the request asked for. The information can be in different formats, most commonly XML or JSON. For this assignment JSON was used. It is possible to have the communication with the database on the client-side, but having it on a server has a number of advantages. When the communication with the database is handled on the server, the server can then handle a lot of different units, for example mobilephone, laptop, tablet or computer. The programming language that the client is using doesn't matter to the server. The REST-server can, for example, be written in PHP (like in this assignemnt) and can still operate with the request sent to it. 

Another central thing with REST is that headers are very important for sending requests. They contain important indentifiying metadata information, authorization, uniform identifier information (URI) and more. There are HTTP response status-codes that can tell the user why something isn't working or that something went through. The most commonly known one is 404 (not found). Others include 200 that signals that something is okey. With the URI parameters and values can be sent to the REST API. If and URI ends with "?category=cars" and a GET request was sent to the REST API it indicates that it wants to get/read everything in the category cars.

For this assignments REST webservice, 4 different php files were used to handle incoming request. 
- create.php handles request methods with POST
- read.php handles request methods with GET
- update.php handles request methods with PUT
- delete.php handles request methods with DELETE

There is also a class-file named Database.php that handles the connection with the SQL database. This is called on in every method php-file. In each of the metod-files the class php.file Course.php is called. This class-file contains the methods that is wrting the SQL-querys for the database. if, for example, delelte.php i requested with a vaild id, it will use the method deleteCourse to write a SQL query to delete that specific course from the database. 

In order to protect the database a clean()-function has been written and can be found in the functions.php file in the root-folder. This will strip any text that is inputed to make sure `<script>`-tags are removed.

The URI:s used in this REST API are the following:

- POST: http://api.fogelcode.com/moment5/api/create.php
- GET (all): http://api.fogelcode.com/moment5/api/read.php
- GET (single): http://api.fogelcode.com/moment5/api/read.php?id=
- PUT: http://api.fogelcode.com/moment5/api/update.php
- DELETE: http://api.fogelcode.com/moment5/api/delete.php?id=

for the single GET and DELETE an id in the form of an integer have to be provided to get or delete that specific course.