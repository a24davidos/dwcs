create table if not exists student(
    id int auto_increment primary key, 
    dni char(9), name varchar(50), 
    surname varchar(250), 
    age int);

insert into student (dni, name, surname, age) values ("11111111A","Draco","Malfoy",25);
insert into student (dni, name, surname, age) values ("22222222B","Hermione","Granger",23);
insert into student (dni, name, surname, age) values ("33333333C","Harry","Potter",20);
insert into student (dni, name, surname, age) values ("44444444D","Ron","Weasley",22);