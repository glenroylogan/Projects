CREATE TABLE Users (
   id INT AUTO_INCREMENT,
   first_name VARCHAR(32),
   last_name VARCHAR(32),
   Constituency VARCHAR(32),
   email VARCHAR(64),
   yrs_service INT,   
   password_digest VARCHAR(64),
   salt VARCHAR(64),
   PRIMARY KEY(id));
