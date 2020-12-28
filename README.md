# Sports Corner

## [Demo Video(s) of Implementation](https://drive.google.com/file/d/1Tgp7jnuS0EHvyK9AL565fFU-TS-FMumx/view?usp=sharing)

### Project Aspects
- In this web project, the current league standings of the top five European  football leagues are displayed. The leagues are 
-- La Liga
-- English Premier League 
-- Bundesliga
-- Ligue 1
-- Serie A 
- One has to be a registered user to be able to use the system.

## Implementation description
### Registration and Log in 
To be able to use the system, one has to be a registered user. 

To register, one has to provided four pieces of information on mandatory basis. They are 
- **Username** Username can be of length between 6 and 20
- **Email** Email has to be valid
- **Password** Password can be of length between 6 and 10. 
- **Gender** Gender should be selected properly. 

Username, email and password need to be unique.  

To log in, one has to provided a valid registered **Email** and **Password** that are both associated with one account. 

### Being in the system  
**Session** has been used, so that, only logged in users can use the system. 



### Display of League tables with information 

- **Home page** After log in, user goes to home page. In the home page, the top four teams of the current league table of five leagues are displayed. 
- **Individual League pages** For each of the five leagues, there are individual webpages. In each of them, current full league table is shown with the information about qualifying for UEFA Champions League and rules of promotion and relegation.

### Navigation and Logging out
From any of the individual league pages or from home page, user can go to any of the pages or log out. 


###  Storing registered users' information

**XAMPP** has been used to store the users' information.  MySQL (XAMPP) has been used for database operation. A database has been created named `sportscornerdb` on `phpMyAdmin`. The database has one table and it is `userstable`. From the SQL files in the repository, the structures of the table can be understood. 

### Getting the current league standings 
To retrieve the current league standings, a Python package has been used. The 	 
   python package is ([soccer-data-api 0.5](https://pypi.org/project/soccer-data-api/)).

### Using PHP and Python together 

Python scripts have been run from PHP source codes. 
   For this, XAMPP needs to be configured. In the `httpd.conf` file, `AddHandler cgi-script .cgi .pl .asp .py` needs to be there instead of 
   `AddHandler cgi-script .cgi .pl .asp` and in the first line of every Python script, the place where Python is installed needs to be mentioned. 
   So, if Python application file is in the folder `J:/WinPython/WPy64-3740/python-3.7.4.amd64` , the first line of Python script 
   should be `#!J:/WinPython/WPy64-3740/python-3.7.4.amd64/python`.
