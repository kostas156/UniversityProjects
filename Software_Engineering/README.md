In order to run the project you will need XAMPP installed in your computer.

1. You run XAMPP Control Panel and activate Apache and MySQL.  
2. Then you connect to MySQL Admin by clicking the button.  
3. Create a user with the right privilages and set the user's name and password as it is shown in db_config.py file and create a database with the name earthquake_tracker.  
4. Then you run the earthquake.sql file inside phpMyAdmin to create the tables and add some test data.

5. Now in order to see the final result of the project you run (simultaneously for the best experience) the 3 .py files (api_app.py, backend_app.py, frontend.py) in terminal.

After that you can use your browser and go to localhost:5001. The homepage will open:
![Homepage](https://github.com/kostas156/UniversityProjects/blob/main/Software_Engineering/homepage.png)

Then you can browse to watch all the possible pages. (Everything that we have added to the pages is working)
![Table](https://github.com/kostas156/UniversityProjects/blob/main/Software_Engineering/table_with_all_earthquakes.png)
![Earthquake number 2](https://github.com/kostas156/UniversityProjects/blob/main/Software_Engineering/earthquake_with_id_2.png)
