CREATE TABLE hostel_management (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo_id VARCHAR(255) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    nationality VARCHAR(100) NOT NULL,
    state_of_origin VARCHAR(100) NOT NULL,
    lga VARCHAR(100) NOT NULL,
    admission_number VARCHAR(100) NOT NULL,
    hostel VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);