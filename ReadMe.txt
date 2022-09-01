To run this project on your system, follow the following instructions:

1. Firstly, you need to install XAMPP (a cross server PHP development environment) from https://www.apachefriends.org/download.html

Note: You can also install LAMP(Linux), WAMP(Windows) or MAMP(MacOS) instead of XAMPP to if you wish to.

2. Now extract project folder 'EXP' from EXP.zip file. You can use winrar or similar software on Windows or it's equivalent on MacOS/Linux.

3. Move the extracted EXP folder to directory. Default htdocs directory location is shown below:
For windows, C:\xampp\htdocs
For linux, /opt/lampp/htdocs

4. Start the Apache server and MySQL frrom XAMPP Control Panel.
If you use linux, run this command:
cd /opt/lampp/ && sudo ./lampp start

5. Now open any web browser and visit the link: http://localhost/phpmyadmin/
Here, you can import 'exp.sql' file that you found in the main folder.

6. Finally run the project by visiting the link: http://localhost/EXP/
