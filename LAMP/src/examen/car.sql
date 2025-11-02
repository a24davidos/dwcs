create TABLE car (
    id INT primary key auto_increment,
    model varchar(100) not null,
    fuel varchar(30) not null,
    price decimal(10,2) not null
);