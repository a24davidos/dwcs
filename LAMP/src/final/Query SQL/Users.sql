create table Users (
    id int auto_increment primary key, 
    first_name varchar(50) not null,
    surname varchar(50) not null,
    password varchar(255) not null,
    email varchar(100) not null unique,

    constraint email_format check (email like '%_@_%._%')
);