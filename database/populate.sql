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

--FAQ
INSERT INTO Faq (id, title, response) VALUES (1, 'How can I contact customer support?', 'You can contact our customer support team by submitting a ticket through our website. Our agents will respond to your inquiry promptly.');
INSERT INTO Faq (id, title, response) VALUES (2, 'What are the customer support hours?', 'Our customer support team is available 24/7 to assist you with your troubleshooting tickets.');
INSERT INTO Faq (id, title, response) VALUES (3, 'How long does it typically take to receive a response from customer support?', 'We strive to respond to troubleshooting tickets within 24 hours. However, response times may vary depending on the complexity of the issue and ticket volume.');
INSERT INTO Faq (id, title, response) VALUES (4, 'What is the process for submitting a troubleshooting ticket?', 'To submit a troubleshooting ticket, simply log in to your account on our website and navigate to the "Submit a Ticket" page. Provide a detailed description of the issue, and our agents will address it as soon as possible.');
INSERT INTO Faq (id, title, response) VALUES (5, 'Can I cancel or modify a troubleshooting ticket?', 'Once a ticket has been submitted, it cannot be canceled. However, if you need to provide additional information or make changes, you can update the ticket by replying to the email notification you received.', '2023-05-15 15:42:16');
INSERT INTO Faq (id, title, response) VALUES (6, 'How do I track the progress of my troubleshooting ticket?', 'You can track the progress of your troubleshooting ticket by logging in to your account and accessing the "My Tickets" section. There, you can view updates, communicate with our agents, and check the status of your ticket.');
INSERT INTO Faq (id, title, response) VALUES (7, 'How can I escalate an urgent issue?', 'If you have an urgent issue that requires immediate attention, please indicate its urgency in the ticket description. Our agents will prioritize such tickets accordingly.');
INSERT INTO Faq (id, title, response) VALUES (8, 'What should I do if I forgot my account password?', 'On the login page, click on the "Forgot Password" link. Follow the instructions to reset your password. An email will be sent to you with further instructions.');
INSERT INTO Faq (id, title, response) VALUES (9, 'Are there any self-help resources available?', 'Yes, we provide a comprehensive knowledge base on our website with troubleshooting guides, FAQs, and tutorials. You can access these resources to find solutions to common issues.');
INSERT INTO Faq (id, title, response) VALUES (10, 'How do I provide feedback on the service I received?', 'We welcome your feedback on the service you received. After your ticket has been resolved, you will have the opportunity to rate and provide feedback on the agent''s assistance.');


--TICKET

--USER
INSERT INTO User (id, username, password, email, full_name, created_at) VALUES (1, 'admin', '$2y$10$z11/BhRA6nqpf4sZU00SNe6LUFjuZGgRUonPLinvgKMkRMgS1cz4q', 'testegmail.com', 'teste', '20120618 10:34:09 AM');
INSERT INTO User (id, username, password, email, full_name, created_at) VALUES (2, 'client', '$2y$10$St7dCkTwluvFPWEZnNs5YucWyFuxAgBrxho5dMqzvA4sh8V/jrSNO', 'client@gmail.com', 'client', '1986');
INSERT INTO User (id, username, password, email, full_name, created_at) VALUES (3, 'agent', '$2y$10$g2D9SeuENLfRsIDAHAFTfO8BNWoNdZ9mUyqZeCgqfS2j2dfWkJxKK', 'agent@gmail.com', 'agent', '1986');
