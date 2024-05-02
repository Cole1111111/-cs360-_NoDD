Hosting NoDD Tale requires having xampp and using phpMyAdmin.
Create a database called nodd_tale.
This database will need two tables, one called 'questions' and another called 'student responses'.
'questions' will need fields 'ass id' (type int(5), part of primary key), 'quest num' (type int(2), part of primary key), 'attributes' (type varchar(20)), 'fd' (type varchar(50)), 'fd table' (type varchar(100)), 'answer' (type varchar(50)).
'student responses' will need fields 'ass id' (type int(5), part of primary key), 'quest num' (type int(2), part of primary key), 'stu id' (type varchar(20), part of primary key), 'stu correct' (type varchar(50)), 'stu wrong' (type varchar(255)), attempts (type int(20)). 
