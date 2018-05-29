STRUCTURE & DATA
* all datas are normalized, only keys are repeated
* this system is based on that no courses have the same course code
* this system is based on that no two instructors have the same name
* index.php includes students.php to meet the requirement of having a file called students.php

USING THE SYSTEM
01. Access all pages through top navigation

    * STUDENTS.php
        • Click on each student row to see:
            - more details about which courses they have
            - grade and grade points for each course
        • All can be open simultaneously for the intent of comparing

    * COURSES.php
        • Displays all detailes for each course

    * INSTRUCTORS.php
        • Displays all instructors and all courses they're assigned to

    * DATA.php
        • Page for uploading new data
        • Checks for duplicates

02. Upload new data / register new student and grades

    * file to uploaded is located in folder: 'csv/'
    * file to upload is called: 'register.csv'

    * go to students.php to see changes

    * go back to students.php and upload new file
        • file is located in folder: 'csv/'
        • file is called: 'register2.csv'

    * if desired a third file is added for upload
        • file is located in folder: 'csv/'
        • file is called: 'register3.csv'