create table MyGuests (
  id integer AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(200) NOT NULL,
  lastname VARCHAR(200) NOT NULL,
  email VARCHAR(200),
  reg_date date
  );