CREATE DATABASE theatre;


USE theatre;


CREATE TABLE events (
  id INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  date_time DATETIME NOT NULL,
  price DECIMAL(10,2) NOT NULL
);

CREATE TABLE halls (
  id INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  seats_count INT NOT NULL,
  seats_description TEXT
);

CREATE TABLE tickets (
  id INT PRIMARY KEY,
  event_id INT NOT NULL,
  hall_id INT NOT NULL,
  seat_number INT NOT NULL,
  status ENUM('Куплен', 'Забронирован', 'Отменен') NOT NULL,
  purchase_datetime DATETIME
);