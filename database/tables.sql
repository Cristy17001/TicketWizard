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



DROP TABLE IF EXISTS Ticket;
CREATE TABLE IF NOT EXISTS Ticket (
    --ID'S
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    user_assigned_id INTEGER ,
    department VARCHAR(100),

    --CONTENT
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    status VARCHAR(20) DEFAULT "Pending",
    priority VARCHAR(20) ,
    created_at DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    isClosed INTEGER NOT NULL CHECK (isClosed IN (0,1)),
    
    --FOREIGN KEYS
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (user_assigned_id) REFERENCES Users(id),
    FOREIGN KEY (department) REFERENCES Department(name)
);

DROP TABLE IF EXISTS Message;
CREATE TABLE IF NOT EXISTS Message (
    --ID'S
    user_id INTEGER NOT NULL,
    ticket_id INTEGER NOT NULL,
    
    --CONTENT
    content TEXT NOT NULL,
    created_at DATETIME NOT NULL,

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

DROP TABLE IF EXISTS Faq;
CREATE TABLE IF NOT EXISTS Faq(
    --ID'S
    id INTEGER PRIMARY KEY,
    title VARCHAR(200),
    response VARCHAR(2000),
    creator INTEGER DEFAULT "Admin",
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (creator) REFERENCES User(id)
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
