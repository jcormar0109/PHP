DROP TABLE IF EXITS BOOKS;

CREATE TABLE BOOKS(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    TITLE VARCHAR(50) NOT NULL,
    AUTHOR VARCHAR(50) NOT NULL,
    PVP FLOAT(6.2) NOT NULL,
    PVP_IVA FLOAT(6.2) NOT NULL
);

INSERT INTO BOOKS (TITLE, AUTHOR, PVP, PVP_IVA) VALUES
                                                    ('Cien años de soledad', 'Gabriel García Márquez', 19.90, 24.08),
                                                    ('Don Quijote de la Mancha', 'Miguel de Cervantes', 17.50, 21.18),
                                                    ('El Principito', 'Antoine de Saint-Exupéry', 12.00, 14.52),
                                                    ('1984', 'George Orwell', 15.20, 18.39),
                                                    ('Fahrenheit 451', 'Ray Bradbury', 14.80, 17.91),
                                                    ('El Hobbit', 'J.R.R. Tolkien', 22.00, 26.62),
                                                    ('El Señor de los Anillos', 'J.R.R. Tolkien', 29.90, 36.18),
                                                    ('Crimen y castigo', 'Fiódor Dostoievski', 18.40, 22.26),
                                                    ('La sombra del viento', 'Carlos Ruiz Zafón', 16.75, 20.27),
                                                    ('Rayuela', 'Julio Cortázar', 14.60, 17.67),
                                                    ('Orgullo y prejuicio', 'Jane Austen', 13.90, 16.82),
                                                    ('Matar a un ruiseñor', 'Harper Lee', 18.10, 21.90),
                                                    ('El nombre del viento', 'Patrick Rothfuss', 25.50, 30.86),
                                                    ('Juego de Tronos', 'George R. R. Martin', 27.90, 33.76),
                                                    ('La historia interminable', 'Michael Ende', 19.20, 23.23),
                                                    ('It', 'Stephen King', 26.40, 31.94),
                                                    ('La Metamorfosis', 'Franz Kafka', 10.50, 12.71),
                                                    ('El alquimista', 'Paulo Coelho', 11.90, 14.40),
                                                    ('Harry Potter y la piedra filosofal', 'J.K. Rowling', 21.30, 25.77),
                                                    ('Sapiens', 'Yuval Noah Harari', 23.60, 28.56);

DROP TABLE IF EXISTS USERS;

CREATE TABLE USERS(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    USERNAME VARCHAR(50) UNIQUE NOT NULL,
    PASSWD VARCHAR(32) NOT NULL,
    FIRST_NAME VARCHAR(40) NOT NULL,
    SECOND_NAME VARCHAR(40) NOT NULL,
    EMAIL VARCHAR(80) NOT NULL,
    ADDRESS VARCHAR(90) NOT NULL
);
