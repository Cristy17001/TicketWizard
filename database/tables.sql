CREATE TABLE Users (
    user_id INTEGER PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL,
    
);

CREATE TABLE Tickets (
    ticket_id INTEGER PRIMARY KEY,
    user_id INTEGER NOT NULL, --user que criou ticket
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    status VARCHAR(20) NOT NULL,
    priority VARCHAR(20) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    isClosed INTEGER NOT NULL CHECK (isClosed IN (0,1)),
    user_assigned_id INTEGER ,
    --departamento
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (user_assigned_id) REFERENCES Users(user_id)

    --departamento
    
);

CREATE TABLE Mensagem (

);
