Instructions to run locally:
1. Extract .zip file and copy content and paste into location: "C:/MAMP/htdocs". 
2. Run "MAMP/XAMPP". Start Server. (Stop MySQL from task manager if it is running, before starting "MAMP/XAMPP")
3. Open browser and go to link: "localhost/MAMP". Go to PHPmyadmin. Create new database and give name: "library_database".
4. Select database "library_database". Then select import and upload the given database from location: "LibraryManagementSystem/Database/library_database.sql"
5. Check the tables of the database. Some dummy values are already added.
6. From browser, go to "localhost/LibraryManagementSystem". This is your website.
7. Logging credentials:-
Admin login: 
username: admin
password: admin
Member Login:
1.
username: User1
password: 123
2.
username: User2
password: 123
8. Members can be created by registering from website. To add admins, execute query: "INSERT INTO users VALUES ('YourAdminName', 'YourAdminPassword', 'admin')". Last value 'admin' is fixed.
9. Let me know for debugging.
10. Good Luck!