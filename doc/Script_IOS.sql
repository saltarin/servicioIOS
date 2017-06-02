DROP DATABASE if exists APPIOS;

CREATE DATABASE APPIOS;

USE APPIOS;

CREATE TABLE USUARIO(
	
	id_usu			INT NOT NULL,
	
	email_usu		VARCHAR(254) NOT NULL,
	pwd_usu			VARCHAR(80) NOT NULL,
	
	nomb_usu		VARCHAR(20) NOT NULL,  -- nombre
	ape_usu			VARCHAR(20) NOT NULL,  -- apellido
	avat_usu		VARCHAR(200) NOT NULL, -- url de la imagen de avatar
	fec_nac_usu		DATE NULL,
	sex_usu			VARCHAR(30) NULL,
	tipo_usu		VARCHAR(20) not null, -- tipo de usuario(comun,empresa)

	fec_reg_usu		DATETIME NOT NULL,
	est_usu			VARCHAR(30) NOT NULL
);

CREATE TABLE TAG(

	id_tag int not null,
    desc_tag varchar(200) not null
	
);

CREATE TABLE OFERTA(

	id_ofer		INT	NOT NULL,
	
	tit_ofer		VARCHAR(100) NOT NULL, -- titulo
	desc_ofer		VARCHAR(200) NOT NULL, -- descripcion
	prec_ofer		decimal(5,2) not null, -- precio
	descu_ofer		decimal(5,2),  -- descuento(aprox)
    tipo_ofer		VARCHAR(100) not null, -- tipo de oferta(TEMPORAL,OCASION,SOLO HOY)
    posX			FLOAT(10,6) null, -- coordenadas W de google 
    posY			FLOAT(10,6) null, -- coordenadas S de google 
    
	fech_ofer	DATETIME NOT NULL, -- fecha registro
	est_ofer		VARCHAR(30)	NOT NULL, -- estado
    
	-- FK
	id_cat		int not null, -- CATEGORIA
	id_usu		INT NOT NULL -- USUARIO
);

CREATE TABLE COMENTARIO(
	
	id_com		INT	NOT NULL,
	mens_com	VARCHAR(1000) NOT NULL, 
	fech_com	DATETIME NOT NULL,
	est_com		VARCHAR(30)	NOT NULL,
    
	-- fk
	id_usu		INT	NOT NULL, -- USUARIO QUE COMENTA(PEPITO COMENTA PUB DE JUANITO)
	id_ofer		INT	NOT NULL, -- OFERTA(comentario: buena oferta! a oferta11)
	id_rep		INT	NULL -- COMENTARIO AL QUE HACE REFERENCIA (comment11 responde comemnt22)
)
;

CREATE TABLE CATEGORIA( -- computacion, comida, ropa, etc

	id_cat int not null,
    desc_cat varchar(100) not null
);

CREATE TABLE CAPTURA(

	id_cap int not null,
    url_cap varchar(200) not null, -- url de la foto
    
    -- fk
    id_ofer int not null -- OFERTA
);

create table OFERTAXTAG(
	id_ofer int not null,
    id_tag int not null
);

create table PUNTUACIONOFERTA(
	id_ofer int not null, -- oferta
    id_usu int not null, -- usuario que puntua
    puntuacion int not null -- cuanto le asigna a la  OFERTA +1,+2,+10 papu y a favoritos
);


-- PKs

ALTER TABLE USUARIO
ADD PRIMARY KEY(id_usu);

ALTER TABLE TAG
ADD PRIMARY KEY(id_tag);

ALTER TABLE OFERTA
ADD PRIMARY KEY(id_ofer);

ALTER TABLE COMENTARIO
ADD PRIMARY KEY(id_com);

ALTER TABLE CATEGORIA
ADD PRIMARY KEY(id_cat);

ALTER TABLE CAPTURA
ADD PRIMARY KEY(id_cap);

ALTER TABLE OFERTAXTAG
ADD PRIMARY KEY(id_ofer,id_tag);

ALTER TABLE PUNTUACIONOFERTA
ADD PRIMARY KEY(id_ofer,id_usu);

-- fk
alter table CAPTURA
add foreign key(id_ofer) references OFERTA(id_ofer);

alter table OFERTA
add foreign key(id_usu) references USUARIO(id_usu);

alter table OFERTA
add foreign key(id_cat) references CATEGORIA(id_Cat);

alter table OFERTAXTAG
add foreign key(id_ofer) references OFERTA(id_ofer);

alter table OFERTAXTAG
add foreign key(id_tag) references TAG(id_tag);

alter table COMENTARIO
add foreign key(id_ofer) references OFERTA(id_ofer);

alter table COMENTARIO
add foreign key(id_rep) references COMENTARIO(id_com);

alter table COMENTARIO
add foreign key(id_usu) references USUARIO(id_usu);

alter table PUNTUACIONOFERTA
add foreign key(id_usu) references USUARIO(id_usu);

alter table PUNTUACIONOFERTA
add foreign key(id_ofer) references OFERTA(id_ofer);

-- listo

select 'yap, ahora puedes programar' as mensaje;



