# Sports Corner ([Demo Video](https://drive.google.com/file/d/1Tgp7jnuS0EHvyK9AL565fFU-TS-FMumx/view?usp=sharing))

 **Sports Corner** is a web project where the table positions of teams of top five footballing leagues can be checked. For access, one has to be a registered user. 

To register, one has to provided four pieces of information. They are 
- **Username** Username can be of length between 6 and 20
- **Email** Email has to be valid
- **Password** Password can be of length between 6 and 10
- **Gender** Proper gender option should be selected

Username, email and password need to be unique. 


To log in, one has to provided a valid registered **Email** and **Password** that are both associated with one account.  


**XAMPP** has been used for development. 


##  Application process
- **Frontend** For designing, HTML, CSS, JavaScript and PHP are used
- **Backend** For different processing, PHP and Python are used. To retrieve the current league standings, a Python package has been used. The 	 
   python package is ([soccer-data-api 0.5](https://pypi.org/project/soccer-data-api/)). Python scripts have been run from PHP source codes. 
   For this, XAMPP needs to be configured. In the `httpd.conf` file, `AddHandler cgi-script .cgi .pl .asp .py` needs to be there instead of 
   `AddHandler cgi-script .cgi .pl .asp` and in the first line of every Python script, the place where Python is installed needs to be mentioned. 
   So, if Python application file is in the folder `J:/WinPython/WPy64-3740/python-3.7.4.amd64` , the first line of Python script 
   should be `#!J:/WinPython/WPy64-3740/python-3.7.4.amd64/python`.
- **Database** MySQL (XAMPP) has been used. From the SQL file in the repository, the table structure of the table of the database can be understood. 
