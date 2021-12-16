Instructions:



The database is created using phpMyAdmin and XAMPP for Windows10. The database is called "games". The SQL_database.sql file can be imported in phpMyAdmin to create the database.

The "categories" table has 3 categories: fighting, retro, and FPS. The category ID for fighting is 1, for retro it's 2, for FPS it's 3.



Using Postman from https://www.postman.com/:



To create a post:



Select POST and enter "api/post/create.php" file location

Adjust headers: 

Click "Headers", 

enter "Content-Type" in the "Key" field

enter "application/json" in the "Value" field.



![Post-step-1](C:\Users\email\Videos\Captures\Post-step-1.png)



Adjust body:

Click "Body",

select "raw",

enter raw JSON as shown.

![Post-step-2](C:\Users\email\Videos\Captures\Post-step-2.png)





To retrieve your post:

1. Select GET method and enter "api/post/read.php" file location.
2. View results in the Body section

![Retrieve-post](C:\Users\email\Videos\Captures\Retrieve-post.png)