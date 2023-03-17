-- order lines
CREATE TABLE donation (
     id INT AUTO_INCREMENT PRIMARY KEY,
     donation_name VARCHAR(255) NULL,
     donation_type VARCHAR(255) NULL,
     donor_id INT NOT NULL,
     FOREIGN KEY (donor_id) REFERENCES donor(id)
);
