The Spider Quiz
===============
Spider Web Development Task 3
Overview
--------
This app is a quiz platform that allows users to post questions and answer them. The questions are divided into categories and the users can view the questions that they have posted. The questions are single answer multiple choice questions with four options. Each user can answer questions other users have posted. On answering correctly, the user gets +1 and gets -1 
for a wrong answer.    
This app runs on PHP and Apache, powered by Laravel, a PHP framework for web artisans.
Database Requirements
---------------------
Laravel supports four database systems including PostgreSQL, SQLite, MySQL and MSSQL. Any one of the systems 
can be used. Ideally, MySQL is preferable. To set up the database system, follow the instructions in the build instructions.    
The tables used in this application are
- Quiz_users which stores the name, username and password of the user. The password is encrypted using the SHA1 algorithm.
- Scores which stores the scores of each user
- Questions which stores the details of the questions posted by all users. The table stores the question ID, the user that 
posted the question, the question itself, the options, the correct option and the category of the question. The question 
ID gets incremented on its own.
- Answered questions, which stores the username of the user who answered the question and the question ID.

List of routes
--------------
**/** - The default home page   
**/signup** - The sign up form is displayed here   
**/login** - Users log in through this page   
**/profile** - Profile page that contains links to other routes   
**/ask** - Route for posting questions   
**/answer** - Route for displaying unanswered questions   
**/leaderboard** - Leaderboard is displayed here   
**/myquestions** - Route for viewing the questions the user has posted   
**/logout** - Route for logging out   
**/processSignUp** - For processing input from the sign up page   
**/processLogIn** - For processing input from the log in page   
**/submitquestion** - For processing the questions posted by the user   
**/answer/{qid}** - Displays the question for the user to answer   
###The following routes are called through an AJAX request   
**/evaluateanswer/{qid}/{answer}** - For processing the answer submitted by the user   
**/verifyUsername/{username}** - For checking whether the username is taken in the sign up page   
**/viewquestion/{qid}** - For viewing details of the questions in the myquestions page   
Build Instructions
------------------
1. Download PHP, Apache and MySQL for your system.
    1. Here's a link for downloading WAMP for Windows. [WAMP](http://www.wampserver.com/en/)
    2. LAMP for linux. [LAMP](http://lamphowto.com/)
    3. You can also install them seperately.
2. Install Laravel for your project directory.
    1. Clone the repository into your project directory from github.   
    ``git clone git@github.com:laravel/laravel.git directory_name``  
    2. Install composer. [COMPOSER](https://getcomposer.org/)
    From the command line, run the following command in the project folder  
    ``composer install``
    3. Rename .env.example to .env
3. Download all the files and put them in the project directory as follows
    1. Replace /apps/Http/routes.php with the downloaded routes.php
    2. Put the following files in the public directory
        1. answer.jpg
        2. leaderboard.jpg
        3. ask.jpg
        4. myquestions.jpg
    3. Put the following files in /resources/views
        1. answer.php
        2. home.php
        3. ask.php
        4. evaluateAnswer.php
        5. answerquestion.php
        6. leaderboard.jpg
        7. login.php
        8. logout.php
        9. myquestions.php
        10. processLogIn.php
        11. processSignUp.php
        12. profile.php
        13. signup.php
        14. submitquestion.php
        15. verifyUsername.php
        16. viewquestion.php
    4. Put the following files in /database/migrations
        1. 2015_07_01_193441_quiz_users.php
        2. 2015_07_04_172653_questions.php
        3. 2015_07_07_160427_scores.php
        4. 2015_07_08_185134_answered_questions.php
4. To setup the database system,
    1. Download MySQL if not downloaded yet.
    2. Open /config/database.php and make sure the default database connection is set to mysql.
    3. Under database connections, set the host, database name, username and password to that of your choice.
    4. Run    
    ``php artisan migrate``
5.  To run the project on localhost on your desired port,
    1. Generate a new key  
    ``php artisan key:generate`` (one time requirement)
    2. Run the following command in your project folder.   
    ``php artisan serve --port=<desired port>``   

Libraries Used
--------------
[**Bootstrap**](http://getbootstrap.com/getting-started/) - For frontend layouts   
[**jQuery**](https://jquery.com/) - Javascript Library      

Screenshots
-----------
![1](https://github.com/sriku97/quiz/blob/master/screenshots/1.png)
![2](https://github.com/sriku97/quiz/blob/master/screenshots/2.png)
![3](https://github.com/sriku97/quiz/blob/master/screenshots/3.png)
![4](https://github.com/sriku97/quiz/blob/master/screenshots/4.png)
![5](https://github.com/sriku97/quiz/blob/master/screenshots/5.png)
![6](https://github.com/sriku97/quiz/blob/master/screenshots/6.png)
![7](https://github.com/sriku97/quiz/blob/master/screenshots/7.png)
