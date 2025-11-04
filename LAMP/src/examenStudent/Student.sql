create table Students(
    id int primary key  auto_increment,
    dni varchar(9) not null,
    firstname varchar(100) not null,
    surname varchar(100) not null,
    age int not null check (age>=0)
);