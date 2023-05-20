--ADMIN(Username: admin | Password: admin1234)
INSERT INTO Admin (id, username, password, email, full_name, created_at) VALUES (1, 'admin', '$2y$10$z11/BhRA6nqpf4sZU00SNe6LUFjuZGgRUonPLinvgKMkRMgS1cz4q', 'testegmail.com', 'teste', '20120618 10:34:09 AM');

--AGENT(Username: agent | Password: agent1234)
INSERT INTO Agent (id, username, password, email, full_name, created_at, department_id) VALUES (1, 'admin', '$2y$10$z11/BhRA6nqpf4sZU00SNe6LUFjuZGgRUonPLinvgKMkRMgS1cz4q', 'testegmail.com', 'teste', '20120618 10:34:09 AM', 1);
INSERT INTO Agent (id, username, password, email, full_name, created_at, department_id) VALUES (3, 'agent', '$2y$10$g2D9SeuENLfRsIDAHAFTfO8BNWoNdZ9mUyqZeCgqfS2', 'agent@gmail.com', 'agent', '1986', 2);


--CLIENT(Username: client | Password: client1234)
INSERT INTO Client (id, username, password, email, full_name, created_at) VALUES (1, 'admin', '$2y$10$z11/BhRA6nqpf4sZU00SNe6LUFjuZGgRUonPLinvgKMkRMgS1cz4q', 'testegmail.com', 'teste', '20120618 10:34:09 AM');
INSERT INTO Client (id, username, password, email, full_name, created_at) VALUES (2, 'client', '$2y$10$St7dCkTwluvFPWEZnNs5YucWyFuxAgBrxho5dMqzvA4', 'client@gmail.com', 'client', '1986');
INSERT INTO Client (id, username, password, email, full_name, created_at) VALUES (3, 'agent', '$2y$10$g2D9SeuENLfRsIDAHAFTfO8BNWoNdZ9mUyqZeCgqfS2', 'agent@gmail.com', 'agent', '1986');

--DEPARTMENT
INSERT INTO Department (id, name) VALUES (1, 'administration');
INSERT INTO Department (id, name) VALUES (2, 'informatics');
INSERT INTO Department (id, name) VALUES (3, 'economics');
INSERT INTO Department (id, name) VALUES (4, 'Marketing');
INSERT INTO Department (id, name) VALUES (5, 'Human Resources');
INSERT INTO Department (id, name) VALUES (6, 'Sales');
INSERT INTO Department (id, name) VALUES (7, 'Finance ');
INSERT INTO Department (id, name) VALUES (8, 'Customer Service');

--MESSAGE

--TICKET

--USER
INSERT INTO User (id, username, password, email, full_name, created_at) VALUES (1, 'admin', '$2y$10$z11/BhRA6nqpf4sZU00SNe6LUFjuZGgRUonPLinvgKMkRMgS1cz4q', 'testegmail.com', 'teste', '20120618 10:34:09 AM');
INSERT INTO User (id, username, password, email, full_name, created_at) VALUES (2, 'client', '$2y$10$St7dCkTwluvFPWEZnNs5YucWyFuxAgBrxho5dMqzvA4sh8V/jrSNO', 'client@gmail.com', 'client', '1986');
INSERT INTO User (id, username, password, email, full_name, created_at) VALUES (3, 'agent', '$2y$10$g2D9SeuENLfRsIDAHAFTfO8BNWoNdZ9mUyqZeCgqfS2j2dfWkJxKK', 'agent@gmail.com', 'agent', '1986');

