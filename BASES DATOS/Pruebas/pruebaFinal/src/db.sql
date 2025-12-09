DROP TABLE IF EXISTS USERS;

CREATE TABLE USERS(
                      ID          INT AUTO_INCREMENT PRIMARY KEY,
                      USERNAME    VARCHAR(20) UNIQUE NOT NULL,
                      PASSWD      VARCHAR(32) NOT NULL
);

INSERT INTO USERS (USERNAME, PASSWD) VALUES
                                         ("alice", MD5 ("alice123")),
                                         ("bob", MD5 ("bob123"));


DROP TABLE IF EXISTS BOOKS;

CREATE TABLE BOOKS(
                      ID INT AUTO_INCREMENT PRIMARY KEY ,
                      TITLE VARCHAR(40) NOT NULL ,
                      AUTHOR VARCHAR(40) NOT NULL,
                      PVP FLOAT(5.2) NOT NULL
);

INSERT INTO BOOKS(TITLE, AUTHOR, PVP) VALUES("alice in borderlands", "alice", 15.00);