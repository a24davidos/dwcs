create table Notes(
    id int auto_increment primary key,
    title varchar(100) not null,
    description text, 
    date datetime default current_timestamp,
    user_id int not null,
    foreign key (user_id) references Users(id) on delete cascade on update cascade
);