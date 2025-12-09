DROP TABLE IF EXISTS BOOKS;

CREATE TABLE BOOKS(
                      ID INT PRIMARY KEY AUTO_INCREMENT,
                      ISBN VARCHAR(40) NOT NULL,
                      TITLE VARCHAR(30) NOT NULL,
                      AUTHOR VARCHAR(30) NOT NULL,
                      PVP FLOAT(3.2) NOT NULL,
    IVA FLOAT(4.2),
    STOCK INT (5)
);

INSERT INTO BOOKS(ISBN,TITLE, AUTHOR, PVP, IVA,STOCK) VALUES ("ISBN","La casa de papel","Juan",15.50, 15.50*1.21, 50);

DROP TABLE IF EXISTS USERS;

CREATE TABLE USERS(
                      ID INT PRIMARY KEY AUTO_INCREMENT,
                      DNI VARCHAR(9) UNIQUE NOT NULL,
                      USERNAME VARCHAR(30) UNIQUE NOT NULL,
                      PASSWD VARCHAR(32) NOT NULL,
                      FIRST_NAME VARCHAR(30) NOT NULL,
                      SECOND_NAME VARCHAR(30) NOT NULL,
                      EMAIL VARCHAR(30) NOT NULL,
                      ADDRESS VARCHAR(40) NOT NULL
);

INSERT INTO USERS(DNI, USERNAME, PASSWD, FIRST_NAME, SECOND_NAME, EMAIL, ADDRESS) VALUES ("12345678L", "alice", MD5("alice123"), "Alice", "Borderlands", "alice@gmail.com" , "Al lado");

INSERT INTO BOOKS(ISBN, TITLE, AUTHOR, PVP, IVA, STOCK) VALUES
                                                            ("ISGN001","El silencio del viento","Laura Pérez",12.90,12.90*1.21,80),
                                                            ("ISGN002","Sombras eternas","Miguel Torres",18.50,18.50*1.21,45),
                                                            ("ISGN003","Viaje a Orión","Carlos Rivas",22.00,22.00*1.21,120),
                                                            ("ISGN004","La niña del puerto","Ana Beltrán",14.20,14.20*1.21,100),
                                                            ("ISGN005","Memorias de hierro","Luis Moreno",19.99,19.99*1.21,30),
                                                            ("ISGN006","El guardián del faro","Carmen Vázquez",16.50,16.50*1.21,65),
                                                            ("ISGN007","Destino lunar","Raúl García",25.00,25.00*1.21,55),
                                                            ("ISGN008","El último samurái","Kento Arai",21.40,21.40*1.21,75),
                                                            ("ISGN009","Doce pasos adelante","Sofía Martín",13.70,13.70*1.21,95),
                                                            ("ISGN010","Horizonte perdido","Daniel Ruiz",27.30,27.30*1.21,20),
                                                            ("ISGN011","Cenizas de un rey","María Campos",18.80,18.80*1.21,60),
                                                            ("ISGN012","El círculo de fuego","Javier Roldán",23.10,23.10*1.21,110),
                                                            ("ISGN013","La torre infinita","Lucía Navarro",11.50,11.50*1.21,150),
                                                            ("ISGN014","El vendedor de sueños","Pablo Delgado",17.99,17.99*1.21,40),
                                                            ("ISGN015","Entre dos mundos","Clara Vidal",28.00,28.00*1.21,70),
                                                            ("ISGN016","Fuego en la arena","José León",19.40,19.40*1.21,85),
                                                            ("ISGN017","El canto de las ballenas","Marta Estevez",10.90,10.90*1.21,200),
                                                            ("ISGN018","La sombra del jaguar","Ricardo Pomares",24.00,24.00*1.21,25),
                                                            ("ISGN019","Caminos rotos","Elena Soto",13.40,13.40*1.21,140),
                                                            ("ISGN020","Tiempo de dragones","Adrián Sáez",29.50,29.50*1.21,35),
                                                            ("ISGN021","El viaje perfecto","Sergio Laguna",15.30,15.30*1.21,100),
                                                            ("ISGN022","Arena roja","Cristina Arias",26.10,26.10*1.21,90),
                                                            ("ISGN023","El secreto del bosque","Irene Pascual",12.40,12.40*1.21,160),
                                                            ("ISGN024","Relatos del norte","Óscar Mora",18.10,18.10*1.21,50),
                                                            ("ISGN025","La máquina del tiempo","Núria Llop",30.00,30.00*1.21,22),
                                                            ("ISGN026","Corazón de acero","Felipe Suárez",21.80,21.80*1.21,130),
                                                            ("ISGN027","El reino azul","Diana Torres",14.75,14.75*1.21,100),
                                                            ("ISGN028","Cazadores del amanecer","Germán Rico",17.60,17.60*1.21,90),
                                                            ("ISGN029","El espejo vacío","Julia Sáenz",23.50,23.50*1.21,44),
                                                            ("ISGN030","Notas desde Venus","Tomás Gil",27.99,27.99*1.21,35),
                                                            ("ISGN031","Hijos del trueno","Andrea Puente",31.40,31.40*1.21,60),
                                                            ("ISGN032","Flor de invierno","Marina Cobo",10.50,10.50*1.21,98),
                                                            ("ISGN033","La espada del alba","Héctor Valdés",28.90,28.90*1.21,40),
                                                            ("ISGN034","Sombras de cristal","Patricia Núñez",16.20,16.20*1.21,120),
                                                            ("ISGN035","Bajo el cielo púrpura","Ruben García",24.60,24.60*1.21,75),
                                                            ("ISGN036","La ciudad oculta","Verónica Ariño",13.90,13.90*1.21,150),
                                                            ("ISGN037","Más allá del océano","Óliver Castro",19.70,19.70*1.21,55),
                                                            ("ISGN038","El ladrón de auroras","Santi Vera",22.90,22.90*1.21,45),
                                                            ("ISGN039","Amanecer de fuego","Nerea Blanco",15.80,15.80*1.21,85),
                                                            ("ISGN040","Códice perdido","Gonzalo Carrión",32.50,32.50*1.21,12),
                                                            ("ISGN041","El eco del trueno","Tania Gómez",18.30,18.30*1.21,68),
                                                            ("ISGN042","La sonrisa del gato","Pau Ferrer",9.99,9.99*1.21,200),
                                                            ("ISGN043","Ríos de plata","Iris Palacios",27.10,27.10*1.21,50),
                                                            ("ISGN044","Sombras en la nieve","Eva Dalmau",14.95,14.95*1.21,88),
                                                            ("ISGN045","Universo paralelo","Víctor Carrizo",26.80,26.80*1.21,30),
                                                            ("ISGN046","El legado perdido","Marcos del Río",20.00,20.00*1.21,70),
                                                            ("ISGN047","Lluvia de estrellas","Lidia Carvajal",11.20,11.20*1.21,140),
                                                            ("ISGN048","Caminos de sal","Fernando Soria",17.10,17.10*1.21,80),
                                                            ("ISGN049","La dama del lago","Silvia Ortiz",23.80,23.80*1.21,55),
                                                            ("ISGN050","El susurro del tiempo","Joaquín Aranda",28.40,28.40*1.21,35),
                                                            ("ISGN051","Mundos de cristal","Alicia Palau",12.30,12.30*1.21,160),
                                                            ("ISGN052","La frontera del viento","Sergio Montes",19.60,19.60*1.21,70),
                                                            ("ISGN053","El príncipe errante","Belén Ortiz",25.20,25.20*1.21,45),
                                                            ("ISGN054","Notas al amanecer","Claudia Rivera",10.99,10.99*1.21,200),
                                                            ("ISGN055","El guardián de los mares","Jordi Aguilar",30.70,30.70*1.21,25),
                                                            ("ISGN056","El oráculo dormido","Susana Vidal",18.75,18.75*1.21,90),
                                                            ("ISGN057","A través del invierno","Esteban Martín",14.10,14.10*1.21,110),
                                                            ("ISGN058","La profecía del águila","Celia Durán",29.80,29.80*1.21,20),
                                                            ("ISGN059","La llave de plata","Vero Sánchez",16.40,16.40*1.21,130),
                                                            ("ISGN060","El coloso de piedra","Diego Corral",22.20,22.20*1.21,65);

DROP TABLE IF EXISTS INVOICES;
CREATE TABLE INVOICES (
                          ID INT PRIMARY KEY AUTO_INCREMENT,
                          DT DATE NOT NULL,
                          N_INVOICE VARCHAR(15) NOT NULL,
                          CLIENT_ID INT (20),
                          DNI VARCHAR(9) UNIQUE NOT NULL,
                          FIRST_NAME VARCHAR(30) NOT NULL,
                          SECOND_NAME VARCHAR(30) NOT NULL,
                          EMAIL VARCHAR(30) NOT NULL,
                          ADDRESS VARCHAR(40) NOT NULL,
                          IVA INT(2) NOT NULL,
                          FOREIGN KEY (CLIENT_ID) REFERENCES USERS(ID)
);

DROP TABLE IF EXISTS INVOICES_DETAILS;