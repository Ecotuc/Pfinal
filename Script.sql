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
    id1 serial NOT NULL ,
    fase character(20) COLLATE pg_catalog."default" NOT NULL,
    cf integer NOT NULL,
    PRIMARY KEY (id1)
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
