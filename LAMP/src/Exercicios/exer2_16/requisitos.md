## EXERCISES DATABASE CONNECTION (I)

Using this user create the table student as described:
create table student (id int auto_increment primary key, dni char(9), name varchar(50), surname varchar(250), age int);
insert into student (dni, name, surname, age) values (‘11111111A’,’Draco’,’Malfoy’,25);
insert into student (dni, name, surname, age) values (‘22222222B’,’Hermione’,’Granger’,23);
insert into student (dni, name, surname, age) values (‘33333333C’,’Harry’,’Potter’,20);
insert into student (dni, name, surname, age) values (‘44444444D’,’Ron’,’Weasley’,22);

## CLASS DIAGRAM DESIGN:

In general we create a class to represent each of the tables in the remote database.
We create one or several classes with the required methods to manage the remote tables data. In this case, the class is OperationsDb.

### Student

-int id
-String dni
-String name
-String surname
-int age
+Student(...)
... other necessary methods

### OperationsDb

- conn
- openConnection()

* closeConnection()
* int addStudent(Student student) --> It inserts a new student in the database
* Student getStudent(search pattern) --> It selects a specific student and it returns a Student object with the data
* int deleteStudent(search pattern) It deletes a specific student
* int modifyStudent(Student student) --> It uses the student dni or id to search for it in the DB, it modifies its data using the rest of the object attributes.
  +array studentsList() --> It returns an array with all the students in the database.

### DB MANAGEMENT: OperationsDB.php

It doesn’t have any interaction with the user interface.
It contains the classes Student and OperationsDB
Use transactions.

### USER INTERFACE: studentManager.php

The only files with user interaction are those with the GUI.

1. Design a GUI to manage students: add, update, delete and select.

2. Create the code using exceptions to control the errors and show clear information about where the error occured and its description.

You can use your own GUI design or a user interface such as:
