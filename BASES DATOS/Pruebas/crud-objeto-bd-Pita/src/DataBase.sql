DROP TABLE IF EXISTS LIBROS;

CREATE TABLE LIBROS(
    ID      INT PRIMARY KEY,
    TITULO  VARCHAR(50),
    AUTOR   VARCHAR(50),
    PVP     DECIMAL(6,2)
);

INSERT INTO LIBROS(TITULO, AUTOR, PVP) VALUES
    ("El quijote", "Cervantes", 23.76),
    ("100 años de soledad", "García-Márquez", 20),
    ("El Criptonomicón", "Stephenson", 54);