-- TABLA BOOKS
DROP TABLE IF EXISTS BOOKS;

CREATE TABLE BOOKS(
                      ID INT PRIMARY KEY AUTO_INCREMENT,
                      ISBN VARCHAR(40) UNIQUE NOT NULL,
                      TITLE VARCHAR(50) NOT NULL,
                      AUTHOR VARCHAR(50) NOT NULL,
                      PVP FLOAT(6,2) NOT NULL,
    IVA FLOAT(4,2) NOT NULL,
    STOCK INT(5) NOT NULL,
    RESUME VARCHAR(255) NOT NULL
);

-- INSERT BOOKS
INSERT INTO BOOKS(ISBN, TITLE, AUTHOR, PVP, IVA, STOCK, RESUME) VALUES
                                                                    ("ISBN001","La casa de papel","Juan",15.50, 15.50*1.21, 50, "Historia de un atraco que cambiará la vida de los protagonistas."),
                                                                    ("ISBN002","El silencio del viento","Laura Pérez",12.90,12.90*1.21,80,"Una novela que narra la tranquilidad y los secretos del viento en un pequeño pueblo."),
                                                                    ("ISBN003","Sombras eternas","Miguel Torres",18.50,18.50*1.21,45,"Misterio y suspense en un mundo donde las sombras guardan secretos imperecederos."),
                                                                    ("ISBN004","Viaje a Orión","Carlos Rivas",22.00,22.00*1.21,120,"Una aventura espacial llena de descubrimientos y peligros en la galaxia Orión."),
                                                                    ("ISBN005","La niña del puerto","Ana Beltrán",14.20,14.20*1.21,100,"Historia de una niña que crece en un puerto lleno de secretos y leyendas."),
                                                                    ("ISBN006","Memorias de hierro","Luis Moreno",19.99,19.99*1.21,30,"Un relato épico de guerras y forja de acero en tierras antiguas."),
                                                                    ("ISBN007","El guardián del faro","Carmen Vázquez",16.50,16.50*1.21,65,"El misterio de un faro y su guardián en la costa brava."),
                                                                    ("ISBN008","Destino lunar","Raúl García",25.00,25.00*1.21,55,"La primera misión humana que cambiará el destino de la luna."),
                                                                    ("ISBN009","El último samurái","Kento Arai",21.40,21.40*1.21,75,"El honor y la batalla del último samurái en tiempos modernos."),
                                                                    ("ISBN010","Doce pasos adelante","Sofía Martín",13.70,13.70*1.21,95,"Historia de superación personal paso a paso en la vida de su protagonista."),
                                                                    ("ISBN011","Horizonte perdido","Daniel Ruiz",27.30,27.30*1.21,20,"Exploración de un territorio desconocido con secretos escondidos."),
                                                                    ("ISBN012","Cenizas de un rey","María Campos",18.80,18.80*1.21,60,"La caída de un imperio y los secretos que permanecen en las cenizas."),
                                                                    ("ISBN013","El círculo de fuego","Javier Roldán",23.10,23.10*1.21,110,"Una profecía que envuelve a un pueblo en llamas y misterio."),
                                                                    ("ISBN014","La torre infinita","Lucía Navarro",11.50,11.50*1.21,150,"Un viaje sin fin por una torre que desafía la realidad."),
                                                                    ("ISBN015","El vendedor de sueños","Pablo Delgado",17.99,17.99*1.21,40,"Un hombre que vende sueños y cambia vidas sin que nadie lo note."),
                                                                    ("ISBN016","Entre dos mundos","Clara Vidal",28.00,28.00*1.21,70,"Una historia de amor y conflicto entre mundos paralelos."),
                                                                    ("ISBN017","Fuego en la arena","José León",19.40,19.40*1.21,85,"Aventuras en desiertos ardientes y misteriosos secretos escondidos."),
                                                                    ("ISBN018","El canto de las ballenas","Marta Estevez",10.90,10.90*1.21,200,"El vínculo entre los humanos y la naturaleza a través del canto de las ballenas."),
                                                                    ("ISBN019","La sombra del jaguar","Ricardo Pomares",24.00,24.00*1.21,25,"Un relato de misterio en la selva, donde un jaguar acecha en las sombras."),
                                                                    ("ISBN020","Caminos rotos","Elena Soto",13.40,13.40*1.21,140,"Historias entrelazadas de personas cuyas vidas se cruzan de manera inesperada."),
                                                                    ("ISBN021","Tiempo de dragones","Adrián Sáez",29.50,29.50*1.21,35,"Dragones, magia y guerras épicas en un mundo fantástico."),
                                                                    ("ISBN022","El viaje perfecto","Sergio Laguna",15.30,15.30*1.21,100,"Un viaje que cambiará para siempre la percepción de la vida del protagonista."),
                                                                    ("ISBN023","Arena roja","Cristina Arias",26.10,26.10*1.21,90,"Misterios y aventuras en desiertos marcados por la arena roja."),
                                                                    ("ISBN024","El secreto del bosque","Irene Pascual",12.40,12.40*1.21,160,"Un bosque que guarda secretos antiguos y peligros ocultos."),
                                                                    ("ISBN025","Relatos del norte","Óscar Mora",18.10,18.10*1.21,50,"Historias que narran la vida en los lugares más fríos y misteriosos del norte."),
                                                                    ("ISBN026","La máquina del tiempo","Núria Llop",30.00,30.00*1.21,22,"Un invento que permite viajar al pasado y alterar la historia."),
                                                                    ("ISBN027","Corazón de acero","Felipe Suárez",21.80,21.80*1.21,130,"Una historia de valentía, honor y decisiones imposibles."),
                                                                    ("ISBN028","El reino azul","Diana Torres",14.75,14.75*1.21,100,"Un reino lleno de enigmas, aventuras y magia."),
                                                                    ("ISBN029","Cazadores del amanecer","Germán Rico",17.60,17.60*1.21,90,"Aventuras de un grupo de cazadores que protegen secretos antiguos."),
                                                                    ("ISBN030","El espejo vacío","Julia Sáenz",23.50,23.50*1.21,44,"Un espejo que refleja más de lo que uno puede imaginar."),
                                                                    ("ISBN031","Notas desde Venus","Tomás Gil",27.99,27.99*1.21,35,"Cartas y notas desde el planeta Venus, explorando su misterio.");
-- TABLA USERS
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

INSERT INTO USERS(DNI, USERNAME, PASSWD, FIRST_NAME, SECOND_NAME, EMAIL, ADDRESS) VALUES
    ("12345678L", "alice", MD5("alice123"), "Alice", "Borderlands", "alice@gmail.com" , "Al lado");

-- TABLA INVOICES
DROP TABLE IF EXISTS INVOICES;

CREATE TABLE INVOICES (
                          ID INT PRIMARY KEY AUTO_INCREMENT,
                          DT DATE NOT NULL,
                          N_INVOICE VARCHAR(15) NOT NULL,
                          CLIENT_ID INT,
                          DNI VARCHAR(9) NOT NULL,
                          FIRST_NAME VARCHAR(30) NOT NULL,
                          SECOND_NAME VARCHAR(30) NOT NULL,
                          ADDRESS VARCHAR(40) NOT NULL,
                          IVA INT(2) NOT NULL,
                          FOREIGN KEY (CLIENT_ID) REFERENCES USERS(ID)
);

-- TABLA INVOICE_DETAILS
DROP TABLE IF EXISTS INVOICE_DETAILS;

CREATE TABLE INVOICE_DETAILS (
                                 ID INT PRIMARY KEY AUTO_INCREMENT,
                                 INVOICE_ID INT NOT NULL,
                                 BOOK_ID INT NOT NULL,
                                 ISBN VARCHAR(40) NOT NULL,
                                 TITLE VARCHAR(50) NOT NULL,
                                 PVP FLOAT(6,2) NOT NULL,
    QUANT INT(5) NOT NULL,
    TOTAL DECIMAL(10,2) NOT NULL,
    TOTAL_IVA DECIMAL(10,2) NOT NULL,
    TOTAL_WITH_IVA DECIMAL(10,2) NOT NULL
);
