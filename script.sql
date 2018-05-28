-- Database: ProyectoCC
-- DROP DATABASE "ProyectoCC";

CREATE DATABASE "ProyectoCC"
\c ProyectoCC

-- Table: public.users
-- DROP TABLE public.users;

CREATE TABLE public.users
(
    nombre character(20) COLLATE pg_catalog."default",
    apellido character(20) COLLATE pg_catalog."default",
    pswrd character(20) COLLATE pg_catalog."default",
    puntos integer,
    usuario character(20) COLLATE pg_catalog."default" NOT NULL,
    tipo character(1) COLLATE pg_catalog."default",
    CONSTRAINT users_pkey PRIMARY KEY (usuario)
)

-- Table: public.equipos
-- DROP TABLE public.equipos;

CREATE TABLE public.equipos
(
    nombre character(20) COLLATE pg_catalog."default" NOT NULL,
    bandera bytea,
    grupo character(1) COLLATE pg_catalog."default",
    puntos integer,
    golesc integer,
    golesf integer,
    CONSTRAINT equipos_pkey PRIMARY KEY (nombre),
    CONSTRAINT equipos_grupo_check CHECK (grupo = 'A'::bpchar OR grupo = 'B'::bpchar OR grupo = 'C'::bpchar OR grupo = 'D'::bpchar OR grupo = 'E'::bpchar OR grupo = 'F'::bpchar OR grupo = 'G'::bpchar OR grupo = 'H'::bpchar)
)

-- Table: public.partidos
-- DROP TABLE public.partidos;

CREATE TABLE public.partidos
(
    equipo1 character(20) COLLATE pg_catalog."default" NOT NULL,
    equipo2 character(20) COLLATE pg_catalog."default" NOT NULL,
    fecha date NOT NULL,
    hora time(6) without time zone NOT NULL,
    gole1 integer NOT NULL,
    gole2 integer NOT NULL,
    id integer NOT NULL DEFAULT nextval('partidos_id_seq'::regclass),
    fase character(20) COLLATE pg_catalog."default" NOT NULL,
    cf integer,
    CONSTRAINT partidos_pkey PRIMARY KEY (id),
    CONSTRAINT equipo1 FOREIGN KEY (equipo1)
        REFERENCES public.equipos (nombre) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT equipo2 FOREIGN KEY (equipo2)
        REFERENCES public.equipos (nombre) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

-- Table: public.quiniela

-- DROP TABLE public.quiniela;

CREATE TABLE public.quiniela
(
    usuario character(20) COLLATE pg_catalog."default" NOT NULL,
    idpartido integer NOT NULL,
    gole1 integer NOT NULL,
    gole2 integer NOT NULL,
    CONSTRAINT quiniela_pkey PRIMARY KEY (usuario, idpartido),
    CONSTRAINT idpartido FOREIGN KEY (idpartido)
        REFERENCES public.partidos (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT usuario FOREIGN KEY (usuario)
        REFERENCES public.users (usuario) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE
)

-- DATOS REALES DEL MUNDIAL
-- EQUIPOS
-- GRUPO A
INSERT INTO equipos VALUES ( 'Egipto', '$escaped','A', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Rusia', '$escaped','A', 0, 0, 0);
INSERT INTO equipos VALUES ( 'A.Saudita', '$escaped','A', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Uruguay', '$escaped','A', 0, 0, 0);
--GRUPO B
INSERT INTO equipos VALUES ( 'Irán', '$escaped','B', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Marruecos', '$escaped','B', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Portugal', '$escaped','B', 0, 0, 0);
INSERT INTO equipos VALUES ( 'España', '$escaped','B', 0, 0, 0);
--GRUPO C
INSERT INTO equipos VALUES ( 'Australia', '$escaped','C', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Dinamarca', '$escaped','C', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Francia', '$escaped','C', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Perú', '$escaped','C', 0, 0, 0);
--GRUPO D
INSERT INTO equipos VALUES ( 'Argentina', '$escaped','D', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Croacia', '$escaped','D', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Islandia', '$escaped','D', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Nigeria', '$escaped','D', 0, 0, 0);
--GRUPO E
INSERT INTO equipos VALUES ( 'Brasil', '$escaped','E', 0, 0, 0);
INSERT INTO equipos VALUES ( 'C.Rica', '$escaped','E', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Serbia', '$escaped','E', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Suiza', '$escaped','E', 0, 0, 0);
--GRUPO F
INSERT INTO equipos VALUES ( 'Alemania', '$escaped','F', 0, 0, 0);
INSERT INTO equipos VALUES ( 'CoreaS.', '$escaped','F', 0, 0, 0);
INSERT INTO equipos VALUES ( 'México', '$escaped','F', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Suecia', '$escaped','F', 0, 0, 0);
--GRUPO G
INSERT INTO equipos VALUES ( 'Bélgica', '$escaped','G', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Inglaterra', '$escaped','G', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Panamá', '$escaped','G', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Túnez', '$escaped','G', 0, 0, 0);
--GRUPO H
INSERT INTO equipos VALUES ( 'Colombia', '$escaped','H', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Japón', '$escaped','H', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Polonia', '$escaped','H', 0, 0, 0);
INSERT INTO equipos VALUES ( 'Senegal', '$escaped','H', 0, 0, 0);

--PARTIDOS
--GRUPO A
INSERT INTO partidos('Rusia', 'A.Saudita', '14/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Egipto', 'Uruguay', '15/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Rusia', 'Egipto', '19/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Uruguay', 'A.Saudita', '20/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('A.Saudita', 'Egipto', '25/06/2018', '08:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Uruguay', 'Rusia', '25/06/2018', '08:00:00', 0, 0, 'Grupos', 0);
--GRUPO B
INSERT INTO partidos('Marruecos', 'Irán', '15/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Portugal', 'España', '15/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Portugal', 'Marruecos', '20/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Irán', 'España', '20/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('España', 'Marruecos', '25/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Irán', 'Portugal', '25/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
--GRUPO C
INSERT INTO partidos('Francia', 'Australia', '16/06/2018', '04:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Perú', 'Dinamarca', '16/06/2018', '10:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Francia', 'Perú', '21/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Dinamarca', 'Australia', '21/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Australia', 'Perú', '26/06/2018', '08:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Dinamarca', 'Francia', '26/06/2018', '08:00:00', 0, 0, 'Grupos', 0);
--GRUPO D
INSERT INTO partidos('Argentina', 'Islandia', '16/06/2018', '07:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Croacia', 'Nigeria', '16/06/2018', '13:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Argentina', 'Croacia', '21/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Nigeria', 'Islanda', '22/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Islandia', 'Croacia', '26/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Nigeria', 'Argentina', '26/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
--GRUPO E
INSERT INTO partidos('C.Rica', 'Serbia', '17/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Brasil', 'Suiza', '17/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Brasil', 'C.Rica', '22/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Serbia', 'Suiza', '22/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Suiza', 'C.Rica', '27/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Serbia', 'Brasil', '27/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
--GRUPO F
INSERT INTO partidos('Alemania', 'México', '17/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Suecia', 'CoreaS.', '18/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Alemania', 'Suecia', '23/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('CoreaS.', 'México', '23/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('México', 'Suecia', '27/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('CoreaS.', 'Alemania', '27/06/2018', '08:00:00', 0, 0, 'Grupos', 0);
--GRUPO G
INSERT INTO partidos('Bélgica', 'Panamá', '18/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Túnez', 'Inglaterra', '18/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Bélgica', 'Túnez', '23/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Inglaterra', 'Panamá', '24/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Panamá', 'Túnez', '28/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Inglaterra', 'Bélgica', '28/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
--GRUPO H
INSERT INTO partidos('Polonia', 'Senegal', '19/06/2018', '06:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Colombia', 'Japón', '19/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Japón', 'Senegal', '24/06/2018', '09:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Polonia', 'Colombia', '24/06/2018', '12:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Senegal', 'Colombia', '28/06/2018', '08:00:00', 0, 0, 'Grupos', 0);
INSERT INTO partidos('Japón', 'Polonia', '28/06/2018', '08:00:00', 0, 0, 'Grupos', 0);