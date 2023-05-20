DROP TABLE IF EXISTS User;
CREATE TABLE IF NOT EXISTS User (
    --ID'S
    id INTEGER PRIMARY KEY AUTOINCREMENT,

    --CONTENT
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS Client;
CREATE TABLE IF NOT EXISTS Client (
    --ID'S
    id INTEGER PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL,

    --FOREIGN KEYS
    FOREIGN KEY (id) REFERENCES User(id),
    FOREIGN KEY (username) REFERENCES User(username),
    FOREIGN KEY (password) REFERENCES User(password),
    FOREIGN KEY (email) REFERENCES User(email),
    FOREIGN KEY (full_name) REFERENCES User(full_name), 
    FOREIGN KEY (created_at) REFERENCES User(created_at)  
);

DROP TABLE IF EXISTS Agent;
CREATE TABLE IF NOT EXISTS Agent (
    --ID'S
    id INTEGER PRIMARY KEY,

    --CONTENT
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL,
    department_id INTEGER,

    --FOREIGN KEYS
    FOREIGN KEY (id) REFERENCES User(id),
    FOREIGN KEY (username) REFERENCES User(username),
    FOREIGN KEY (password) REFERENCES User(password),
    FOREIGN KEY (email) REFERENCES User(email),
    FOREIGN KEY (full_name) REFERENCES User(full_name), 
    FOREIGN KEY (created_at) REFERENCES User(created_at),
    FOREIGN KEY (department_id) REFERENCES Department(id)  
);


DROP TABLE IF EXISTS Admin;
CREATE TABLE IF NOT EXISTS Admin (

    --ID
    id INTEGER PRIMARY KEY,

    --CONTENT
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL,

    --FOREIGN KEYS
    FOREIGN KEY (id) REFERENCES User(id),
    FOREIGN KEY (username) REFERENCES User(username),
    FOREIGN KEY (password) REFERENCES User(password),
    FOREIGN KEY (email) REFERENCES User(email),
    FOREIGN KEY (full_name) REFERENCES User(full_name), 
    FOREIGN KEY (created_at) REFERENCES User(created_at)
);

--
--
---- Triggers for updating Admin, Agent, and Client
--CREATE TRIGGER IF NOT EXISTS update_admin
--AFTER UPDATE ON User
--FOR EACH ROW
--WHEN (NEW.id = Admin.id)
--BEGIN
--    UPDATE Admin
--    SET username = NEW.username,
--        email = NEW.email,
--        full_name = NEW.full_name
--    WHERE id = NEW.id;
--END;
--
--CREATE TRIGGER IF NOT EXISTS update_agent
--AFTER UPDATE ON User
--FOR EACH ROW
--WHEN (NEW.id = Agent.id)
--BEGIN
--    UPDATE Agent
--    SET username = NEW.username,
--        email = NEW.email,
--        full_name = NEW.full_name
--    WHERE id = NEW.id;
--END;
--
--CREATE TRIGGER IF NOT EXISTS update_client
--AFTER UPDATE ON User
--FOR EACH ROW
--WHEN (NEW.id = Client.id)
--BEGIN
--    UPDATE Client
--    SET username = NEW.username,
--        email = NEW.email,
--        full_name = NEW.full_name
--    WHERE id = NEW.id;
--END;
--

DROP TABLE IF EXISTS Ticket;
CREATE TABLE IF NOT EXISTS Ticket (
    --ID'S
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    user_assigned_id INTEGER ,
    department_id INTEGER,

    --CONTENT
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    status VARCHAR(20) NOT NULL,
    priority VARCHAR(20) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    isClosed INTEGER NOT NULL CHECK (isClosed IN (0,1)),
    
    --FOREIGN KEYS
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (user_assigned_id) REFERENCES Users(id),
    FOREIGN KEY (department_id) REFERENCES Department(id)
);

DROP TABLE IF EXISTS Message;
CREATE TABLE IF NOT EXISTS Message (
    --ID'S
    user_id INTEGER NOT NULL,
    ticket_id INTEGER NOT NULL,
    
    --CONTENT
    content TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATATIME NOT NULL,

    --FOREIGN KEYS
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (ticket_id) REFERENCES Ticket(id)

);


DROP TABLE IF EXISTS Department;
CREATE TABLE IF NOT EXISTS Department(
    --ID'S
    id INTEGER PRIMARY KEY,

    --CONTENT
    name VARCHAR(50) NOT NULL

    --FOREIGN KEYS

);


DROP TABLE IF EXISTS Post;
CREATE TABLE IF NOT EXISTS Post(
--ID'S
    user_id INTEGER NOT NULL,
    id INTEGER PRIMARY KEY,

    --CONTENT
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,

    --FOREIGN KEYS
    FOREIGN KEY (user_id) REFERENCES User(id)

);

--ver relaçao Department e Agent
--completar Department
