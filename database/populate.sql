--Administration
INSERT INTO Department(id,name) VALUES (1,'administration');

--ADMIN(Username: admin | Password: admin1234)
INSERT INTO User(id,username,password,email,full_name,created_at)  VALUES (1,'admin','$2y$10$z11/BhRA6nqpf4sZU00SNe6LUFjuZGgRUonPLinvgKMkRMgS1cz4q','testegmail.com','teste','20120618 10:34:09 AM');
INSERT INTO Admin(id,username,password,email,full_name,created_at)  VALUES (1,'admin','$2y$10$z11/BhRA6nqpf4sZU00SNe6LUFjuZGgRUonPLinvgKMkRMgS1cz4q','testegmail.com','teste','20120618 10:34:09 AM');
INSERT INTO Agent (id,username,password,email,full_name,created_at,department_id) VALUES (1,'admin','$2y$10$z11/BhRA6nqpf4sZU00SNe6LUFjuZGgRUonPLinvgKMkRMgS1cz4q','testegmail.com','teste','20120618 10:34:09 AM',1);
INSERT INTO Client(id,username,password,email,full_name,created_at)  VALUES (1,'admin','$2y$10$z11/BhRA6nqpf4sZU00SNe6LUFjuZGgRUonPLinvgKMkRMgS1cz4q','testegmail.com','teste','20120618 10:34:09 AM');
