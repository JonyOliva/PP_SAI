--
-- PostgreSQL database dump
--

-- Dumped from database version 8.4.8
-- Dumped by pg_dump version 12.2

-- Started on 2020-09-29 12:18:02

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET escape_string_warning = off;
SET row_security = off;

--
-- TOC entry 661 (class 2612 OID 16389)
-- Name: plpgsql; Type: PROCEDURAL LANGUAGE; Schema: -; Owner: postgres
--

CREATE OR REPLACE PROCEDURAL LANGUAGE plpgsql;


ALTER PROCEDURAL LANGUAGE plpgsql OWNER TO postgres;

SET default_tablespace = '';

--
-- TOC entry 187 (class 1259 OID 24576)
-- Name: alumnos_examenes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alumnos_examenes (
    alex_idinstanciaalumno character varying(10) NOT NULL,
    alex_idinstanciacurso character varying(10) NOT NULL,
    alex_idmateria character varying(10) NOT NULL,
    alex_idexamen character varying(10) NOT NULL,
    alex_calificacion double precision DEFAULT 0
);


ALTER TABLE public.alumnos_examenes OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 24582)
-- Name: alumnos_materias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alumnos_materias (
    alma_idinstanciaalumno character varying(10) NOT NULL,
    alma_idinstanciacurso character varying(10) NOT NULL,
    alma_idmateria character varying(10) NOT NULL,
    alma_cantpres integer DEFAULT 0,
    alma_cantaus integer DEFAULT 0,
    alma_canttotal integer DEFAULT 0,
    alma_asistenciaporc double precision DEFAULT 0,
    alma_estado character varying(20),
    alma_cursado character varying(20),
    alma_notafinal double precision DEFAULT 0
);


ALTER TABLE public.alumnos_materias OWNER TO postgres;

--
-- TOC entry 140 (class 1259 OID 17039)
-- Name: anexo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.anexo (
    anex_id character varying(10) NOT NULL,
    anex_descripcion character varying(70),
    anex_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.anexo OWNER TO postgres;

--
-- TOC entry 141 (class 1259 OID 17043)
-- Name: carreras; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carreras (
    carr_id character varying(10) NOT NULL,
    carr_idtipocarrera character varying(10) NOT NULL,
    carr_codigointerno character varying(10),
    carr_descripcion character varying(50) NOT NULL,
    carr_idinscripcion character varying(10),
    carr_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.carreras OWNER TO postgres;

--
-- TOC entry 142 (class 1259 OID 17047)
-- Name: carreras_anexo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carreras_anexo (
    caan_id character varying(10) NOT NULL,
    caan_idinscripcion character varying(10) NOT NULL,
    caan_idanexo character varying(10) NOT NULL
);


ALTER TABLE public.carreras_anexo OWNER TO postgres;

--
-- TOC entry 143 (class 1259 OID 17050)
-- Name: carreras_modalidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carreras_modalidad (
    camo_id character varying(10) NOT NULL,
    camo_idindcripcion character varying(10) NOT NULL,
    camo_idmodalidad character varying(10) NOT NULL
);


ALTER TABLE public.carreras_modalidad OWNER TO postgres;

--
-- TOC entry 144 (class 1259 OID 17053)
-- Name: carreras_turnos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carreras_turnos (
    catu_id character varying(10) NOT NULL,
    catu_idinscripcion character varying(10) NOT NULL,
    catu_idturno character varying(10) NOT NULL
);


ALTER TABLE public.carreras_turnos OWNER TO postgres;

--
-- TOC entry 145 (class 1259 OID 17056)
-- Name: colegios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.colegios (
    cole_id character varying(10) NOT NULL,
    cole_descripcion character varying(70) NOT NULL,
    cole_tipo character varying(25),
    cole_direccion character varying(70),
    cole_idlocalidad character varying(10),
    cole_telefono character varying(30),
    cole_email character varying(50),
    cole_codespecial character varying(20),
    cole_baja character varying(1) DEFAULT 0 NOT NULL,
    cole_nivel character varying(20)
);


ALTER TABLE public.colegios OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 24592)
-- Name: cursos_alumnos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cursos_alumnos (
    cual_idinstanciaalumno character varying(10) NOT NULL,
    cual_idinstanciacurso character varying(10) NOT NULL,
    cual_estado character varying(20)
);


ALTER TABLE public.cursos_alumnos OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 24597)
-- Name: cursos_materias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cursos_materias (
    cuma_idinstanciacurso character varying(10) NOT NULL,
    cuma_idmateria character varying(10) NOT NULL,
    cuma_aprobacion character varying(30) NOT NULL,
    cuma_cantexamenes integer DEFAULT 0,
    cuma_estado character varying(15) DEFAULT 'ABIERTA'::character varying
);


ALTER TABLE public.cursos_materias OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 24604)
-- Name: cursos_presentismo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cursos_presentismo (
    cupr_idinstanciaalumno character varying(10) NOT NULL,
    cupr_idinstanciacurso character varying(10) NOT NULL,
    cupr_fecha date NOT NULL,
    cupr_presentismo character varying(1) NOT NULL,
    cupr_idmateria character varying(10) NOT NULL
);


ALTER TABLE public.cursos_presentismo OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 17362)
-- Name: datos_encuestas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.datos_encuestas (
    daen_idinscripcion character varying(10) NOT NULL,
    daen_tipoenc character varying(25) NOT NULL,
    daen_selecenc character varying(25) NOT NULL,
    daen_otroenc character varying(100)
);


ALTER TABLE public.datos_encuestas OWNER TO postgres;

--
-- TOC entry 146 (class 1259 OID 17066)
-- Name: datos_estudios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.datos_estudios (
    daes_idinscripcion character varying(10) NOT NULL,
    daes_estudioscursados character varying(25),
    daes_idtitulo character varying(10),
    daes_dependencia character varying(25),
    daes_anioegreso character varying(4),
    daes_idcolegio character varying(10),
    daes_cantanios character varying(2),
    daes_otrosestudios character varying(15),
    daes_otroscarrera character varying(70),
    daes_otrosestablecimiento character varying(70),
    daes_otrosestado character varying(10),
    daes_informatica character varying(2),
    daes_idioma character varying(2),
    daes_cual character varying(50),
    daes_idorientacion character varying(10)
);


ALTER TABLE public.datos_estudios OWNER TO postgres;

--
-- TOC entry 147 (class 1259 OID 17069)
-- Name: datos_familia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.datos_familia (
    dafa_idinscripcion character varying(10) NOT NULL,
    dafa_padre character varying(2),
    dafa_padreestudios character varying(20),
    dafa_padreocupacion character varying(70),
    dafa_madre character varying(2),
    dafa_madreestudios character varying(20),
    dafa_madreocupacion character varying(70),
    dafa_conyugeestudios character varying(20),
    dafa_conyugeocupacion character varying(70)
);


ALTER TABLE public.datos_familia OWNER TO postgres;

--
-- TOC entry 148 (class 1259 OID 17072)
-- Name: datos_inscripcion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.datos_inscripcion (
    dain_id character varying(10) NOT NULL,
    dain_fechainscripcion date NOT NULL,
    dain_idcarrera character varying(10) NOT NULL,
    dain_idanexo character varying(10) NOT NULL,
    dain_idmodalidad character varying(10) NOT NULL,
    dain_legajo character varying(15),
    dain_idturno character varying,
    dain_nropreinscripcion character varying(50) DEFAULT 0,
    dain_idinstancia character varying(10) DEFAULT 0 NOT NULL,
    dain_nroinscripcion integer DEFAULT 0,
    dain_estado character varying(20) DEFAULT 'PREINSCRIPCION'::character varying
);


ALTER TABLE public.datos_inscripcion OWNER TO postgres;

--
-- TOC entry 149 (class 1259 OID 17082)
-- Name: datos_personales; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.datos_personales (
    dape_idinscripcion character varying(10) NOT NULL,
    dape_apellido character varying(70) NOT NULL,
    dape_nombre character varying(50) NOT NULL,
    dape_tipodoc character varying(10) NOT NULL,
    dape_nrodoc character varying(8) NOT NULL,
    dape_calle character varying(50),
    dape_nrocalle character varying(5),
    dape_piso character varying(2),
    dape_dpto character varying(10),
    dape_idlocalidad character varying(10),
    dape_telparticular character varying(15),
    dape_celular character varying(15),
    dape_email character varying(50),
    dape_fechanac date,
    dape_idlocalidadnac character varying(70),
    dape_sexo character varying(10),
    dape_nacionalidad character varying(15),
    dape_pais character varying(10),
    dape_estadocivil character varying(20),
    dape_hijos character varying(2),
    dape_cantidadhijos character varying(2),
    dape_edades character varying(50),
    dape_cuil character varying(12),
    dape_grupo character varying(5)
);


ALTER TABLE public.datos_personales OWNER TO postgres;

--
-- TOC entry 150 (class 1259 OID 17088)
-- Name: datos_trabajo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.datos_trabajo (
    datr_idinscripcion character varying(10) NOT NULL,
    datr_trabaja character varying(2),
    datr_ocupacion character varying(100),
    datr_horassemanales character varying(15),
    datr_relacion character varying(20),
    datr_empresa character varying(70),
    datr_cargo character varying(70)
);


ALTER TABLE public.datos_trabajo OWNER TO postgres;

--
-- TOC entry 151 (class 1259 OID 17091)
-- Name: instancias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.instancias (
    inst_id character varying(10) NOT NULL,
    inst_idinscripcion character varying(10) NOT NULL,
    inst_descripcion character varying(70) NOT NULL,
    inst_anio character varying(4) NOT NULL,
    inst_nroinscripcion character varying(5) DEFAULT 0 NOT NULL,
    inst_estado character varying(20) NOT NULL,
    inst_fechainicio date,
    inst_fechafin date
);


ALTER TABLE public.instancias OWNER TO postgres;

--
-- TOC entry 152 (class 1259 OID 17095)
-- Name: localidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.localidad (
    loca_id character varying(10) NOT NULL,
    loca_idprovincia character varying(10) NOT NULL,
    loca_idpartido character varying(10),
    loca_descripcion character varying(70) NOT NULL,
    loca_cp character varying(20) NOT NULL,
    loca_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.localidad OWNER TO postgres;

--
-- TOC entry 153 (class 1259 OID 17099)
-- Name: modalidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modalidad (
    moda_id character varying(10) NOT NULL,
    moda_descripcion character varying(50) NOT NULL,
    moda_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.modalidad OWNER TO postgres;

--
-- TOC entry 154 (class 1259 OID 17103)
-- Name: orientacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orientacion (
    orie_id character varying(10) NOT NULL,
    orie_idtitulo character varying(10) NOT NULL,
    orie_descripcion character varying(100) NOT NULL
);


ALTER TABLE public.orientacion OWNER TO postgres;

--
-- TOC entry 155 (class 1259 OID 17106)
-- Name: pais; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pais (
    pais_id character varying(10) NOT NULL,
    pais_descripcion character varying(70) NOT NULL,
    pais_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.pais OWNER TO postgres;

--
-- TOC entry 156 (class 1259 OID 17110)
-- Name: partido; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.partido (
    part_id character varying(10) NOT NULL,
    part_descripcion character varying(70) NOT NULL,
    part_baja character varying(1) DEFAULT 0 NOT NULL,
    part_idprovincia character varying(10) DEFAULT 0 NOT NULL
);


ALTER TABLE public.partido OWNER TO postgres;

--
-- TOC entry 157 (class 1259 OID 17115)
-- Name: provincias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.provincias (
    prov_id character varying(10) NOT NULL,
    prov_descripcion character varying(50) NOT NULL,
    prov_idpais character varying(10) DEFAULT 0 NOT NULL,
    prov_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.provincias OWNER TO postgres;

--
-- TOC entry 158 (class 1259 OID 17120)
-- Name: titulos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.titulos (
    titu_id character varying(10) NOT NULL,
    titu_descripcion character varying(70) NOT NULL,
    titu_nivel character varying(20),
    titu_baja character varying(1)
);


ALTER TABLE public.titulos OWNER TO postgres;

--
-- TOC entry 159 (class 1259 OID 17123)
-- Name: ingresantes; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.ingresantes AS
SELECT datos_inscripcion.dain_nroinscripcion, datos_personales.dape_apellido, datos_personales.dape_nombre, datos_personales.dape_tipodoc, datos_personales.dape_nrodoc, datos_personales.dape_calle, datos_personales.dape_nrocalle, datos_personales.dape_piso, datos_personales.dape_dpto, localidad.loca_descripcion, provincias.prov_descripcion, partido.part_descripcion, pais.pais_descripcion, datos_personales.dape_telparticular, datos_personales.dape_celular, datos_personales.dape_email, datos_personales.dape_fechanac, datos_personales.dape_idlocalidadnac, datos_personales.dape_sexo, datos_personales.dape_nacionalidad, datos_personales.dape_estadocivil, datos_personales.dape_hijos, datos_personales.dape_cantidadhijos, datos_personales.dape_edades, datos_personales.dape_pais, modalidad.moda_descripcion, carreras.carr_descripcion, datos_estudios.daes_estudioscursados, titulos.titu_descripcion, datos_estudios.daes_dependencia, datos_estudios.daes_anioegreso, colegios.cole_descripcion, colegios.cole_direccion, colegios.cole_telefono, colegios.cole_email, datos_estudios.daes_cantanios, datos_estudios.daes_otrosestudios, datos_estudios.daes_otroscarrera, datos_estudios.daes_otrosestablecimiento, datos_estudios.daes_otrosestado, datos_estudios.daes_informatica, datos_estudios.daes_idioma, datos_estudios.daes_cual, orientacion.orie_descripcion, datos_trabajo.datr_trabaja, datos_trabajo.datr_ocupacion, datos_trabajo.datr_horassemanales, datos_trabajo.datr_relacion, datos_trabajo.datr_empresa, datos_trabajo.datr_cargo, datos_familia.dafa_padre, datos_familia.dafa_padreestudios, datos_familia.dafa_padreocupacion, datos_familia.dafa_madre, datos_familia.dafa_madreestudios, datos_familia.dafa_madreocupacion, datos_familia.dafa_conyugeestudios, datos_familia.dafa_conyugeocupacion FROM (((((((((public.datos_inscripcion JOIN public.carreras ON (((datos_inscripcion.dain_idcarrera)::text = (carreras.carr_id)::text))) JOIN public.anexo ON (((datos_inscripcion.dain_idanexo)::text = (anexo.anex_id)::text))) JOIN public.modalidad ON (((datos_inscripcion.dain_idmodalidad)::text = (modalidad.moda_id)::text))) JOIN ((((public.datos_personales JOIN public.localidad ON (((datos_personales.dape_idlocalidad)::text = (localidad.loca_id)::text))) JOIN public.provincias ON (((localidad.loca_idprovincia)::text = (provincias.prov_id)::text))) JOIN public.pais ON (((provincias.prov_idpais)::text = (pais.pais_id)::text))) JOIN public.partido ON (((localidad.loca_idpartido)::text = (partido.part_id)::text))) ON (((datos_inscripcion.dain_id)::text = (datos_personales.dape_idinscripcion)::text))) JOIN ((public.datos_estudios JOIN public.titulos ON (((datos_estudios.daes_idtitulo)::text = (titulos.titu_id)::text))) JOIN public.colegios ON (((datos_estudios.daes_idcolegio)::text = (colegios.cole_id)::text))) ON (((datos_inscripcion.dain_id)::text = (datos_estudios.daes_idinscripcion)::text))) JOIN public.datos_familia ON (((datos_inscripcion.dain_id)::text = (datos_familia.dafa_idinscripcion)::text))) JOIN public.datos_trabajo ON (((datos_inscripcion.dain_id)::text = (datos_trabajo.datr_idinscripcion)::text))) JOIN public.orientacion ON (((datos_estudios.daes_idorientacion)::text = (orientacion.orie_id)::text))) JOIN public.instancias ON (((datos_inscripcion.dain_idinstancia)::text = (instancias.inst_id)::text))) WHERE ((((datos_inscripcion.dain_nroinscripcion > 0) AND ((datos_inscripcion.dain_idinstancia)::text = '31463'::text)) OR ((datos_inscripcion.dain_idinstancia)::text = '31947'::text)) OR ((datos_inscripcion.dain_idinstancia)::text = '32237'::text)) ORDER BY datos_inscripcion.dain_nroinscripcion;


ALTER TABLE public.ingresantes OWNER TO postgres;

--
-- TOC entry 160 (class 1259 OID 17128)
-- Name: ingresantes_con_id; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.ingresantes_con_id AS
SELECT datos_inscripcion.dain_id, datos_inscripcion.dain_nroinscripcion, datos_personales.dape_apellido, datos_personales.dape_nombre, datos_personales.dape_tipodoc, datos_personales.dape_nrodoc, datos_personales.dape_calle, datos_personales.dape_nrocalle, datos_personales.dape_piso, datos_personales.dape_dpto, localidad.loca_descripcion, provincias.prov_descripcion, partido.part_descripcion, pais.pais_descripcion, datos_personales.dape_telparticular, datos_personales.dape_celular, datos_personales.dape_email, datos_personales.dape_fechanac, datos_personales.dape_idlocalidadnac, datos_personales.dape_sexo, datos_personales.dape_nacionalidad, datos_personales.dape_estadocivil, datos_personales.dape_hijos, datos_personales.dape_cantidadhijos, datos_personales.dape_edades, datos_personales.dape_pais, modalidad.moda_descripcion, carreras.carr_descripcion, datos_estudios.daes_estudioscursados, titulos.titu_descripcion, datos_estudios.daes_dependencia, datos_estudios.daes_anioegreso, colegios.cole_descripcion, colegios.cole_direccion, colegios.cole_telefono, colegios.cole_email, datos_estudios.daes_cantanios, datos_estudios.daes_otrosestudios, datos_estudios.daes_otroscarrera, datos_estudios.daes_otrosestablecimiento, datos_estudios.daes_otrosestado, datos_estudios.daes_informatica, datos_estudios.daes_idioma, datos_estudios.daes_cual, orientacion.orie_descripcion, datos_trabajo.datr_trabaja, datos_trabajo.datr_ocupacion, datos_trabajo.datr_horassemanales, datos_trabajo.datr_relacion, datos_trabajo.datr_empresa, datos_trabajo.datr_cargo, datos_familia.dafa_padre, datos_familia.dafa_padreestudios, datos_familia.dafa_padreocupacion, datos_familia.dafa_madre, datos_familia.dafa_madreestudios, datos_familia.dafa_madreocupacion, datos_familia.dafa_conyugeestudios, datos_familia.dafa_conyugeocupacion FROM (((((((((public.datos_inscripcion JOIN public.carreras ON (((datos_inscripcion.dain_idcarrera)::text = (carreras.carr_id)::text))) JOIN public.anexo ON (((datos_inscripcion.dain_idanexo)::text = (anexo.anex_id)::text))) JOIN public.modalidad ON (((datos_inscripcion.dain_idmodalidad)::text = (modalidad.moda_id)::text))) JOIN ((((public.datos_personales JOIN public.localidad ON (((datos_personales.dape_idlocalidad)::text = (localidad.loca_id)::text))) JOIN public.provincias ON (((localidad.loca_idprovincia)::text = (provincias.prov_id)::text))) JOIN public.pais ON (((provincias.prov_idpais)::text = (pais.pais_id)::text))) JOIN public.partido ON (((localidad.loca_idpartido)::text = (partido.part_id)::text))) ON (((datos_inscripcion.dain_id)::text = (datos_personales.dape_idinscripcion)::text))) JOIN ((public.datos_estudios JOIN public.titulos ON (((datos_estudios.daes_idtitulo)::text = (titulos.titu_id)::text))) JOIN public.colegios ON (((datos_estudios.daes_idcolegio)::text = (colegios.cole_id)::text))) ON (((datos_inscripcion.dain_id)::text = (datos_estudios.daes_idinscripcion)::text))) JOIN public.datos_familia ON (((datos_inscripcion.dain_id)::text = (datos_familia.dafa_idinscripcion)::text))) JOIN public.datos_trabajo ON (((datos_inscripcion.dain_id)::text = (datos_trabajo.datr_idinscripcion)::text))) JOIN public.orientacion ON (((datos_estudios.daes_idorientacion)::text = (orientacion.orie_id)::text))) JOIN public.instancias ON (((datos_inscripcion.dain_idinstancia)::text = (instancias.inst_id)::text))) WHERE ((((datos_inscripcion.dain_nroinscripcion > 0) AND ((datos_inscripcion.dain_idinstancia)::text = '31463'::text)) OR ((datos_inscripcion.dain_idinstancia)::text = '31947'::text)) OR ((datos_inscripcion.dain_idinstancia)::text = '32237'::text)) ORDER BY datos_inscripcion.dain_nroinscripcion;


ALTER TABLE public.ingresantes_con_id OWNER TO postgres;

--
-- TOC entry 161 (class 1259 OID 17133)
-- Name: inscripcion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.inscripcion (
    insc_id character varying(10) NOT NULL,
    insc_descripcion character varying(70) NOT NULL
);


ALTER TABLE public.inscripcion OWNER TO postgres;

--
-- TOC entry 162 (class 1259 OID 17136)
-- Name: inscripcion_carreras; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.inscripcion_carreras (
    inca_id character varying(10) NOT NULL,
    inca_idinscripcion character varying(10) NOT NULL,
    inca_idcarrera character varying(10) NOT NULL
);


ALTER TABLE public.inscripcion_carreras OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 24609)
-- Name: instancia_cursos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.instancia_cursos (
    incu_id character varying(10) NOT NULL,
    incu_idinstancia character varying(10) NOT NULL,
    incu_descripcion character varying(100) NOT NULL,
    incu_cupomax integer DEFAULT 0,
    incu_cupomin integer DEFAULT 0,
    incu_cantidad integer DEFAULT 0,
    incu_estado character varying(15) DEFAULT 'ESPERA'::character varying
);


ALTER TABLE public.instancia_cursos OWNER TO postgres;

--
-- TOC entry 163 (class 1259 OID 17145)
-- Name: instancias_anexos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.instancias_anexos (
    inan_id character varying(10) NOT NULL,
    inan_idinstancia character varying(10) NOT NULL,
    inan_idanexo character varying(10) NOT NULL
);


ALTER TABLE public.instancias_anexos OWNER TO postgres;

--
-- TOC entry 164 (class 1259 OID 17148)
-- Name: instancias_materias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.instancias_materias (
    inma_id character varying(10) NOT NULL,
    inma_idinstancia character varying(10) NOT NULL,
    inma_idmateria character varying(10) NOT NULL
);


ALTER TABLE public.instancias_materias OWNER TO postgres;

--
-- TOC entry 165 (class 1259 OID 17151)
-- Name: instancias_modalidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.instancias_modalidad (
    inmo_id character varying(10) NOT NULL,
    inmo_idinstancia character varying(10) NOT NULL,
    inmo_idmodalidad character varying(10) NOT NULL
);


ALTER TABLE public.instancias_modalidad OWNER TO postgres;

--
-- TOC entry 166 (class 1259 OID 17154)
-- Name: instancias_turnos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.instancias_turnos (
    intu_id character varying(10) NOT NULL,
    intu_idinstancia character varying(10) NOT NULL,
    intu_idturno character varying(10) NOT NULL
);


ALTER TABLE public.instancias_turnos OWNER TO postgres;

--
-- TOC entry 167 (class 1259 OID 17157)
-- Name: materias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.materias (
    mate_id character varying(10) NOT NULL,
    mate_descripcion character varying(70) NOT NULL,
    mate_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.materias OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 24618)
-- Name: materias_examenes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.materias_examenes (
    maex_idinstanciacurso character varying(10) NOT NULL,
    maex_idmateria character varying(10) NOT NULL,
    maex_idexamen character varying(10) NOT NULL,
    maex_descripcion character varying(100) NOT NULL,
    maex_descripcioncorta character varying(10) NOT NULL,
    maex_tipoexamen character varying(30) NOT NULL,
    maex_calificacion character varying(15) NOT NULL,
    maex_aprobacion character varying(15) NOT NULL,
    maex_fecha date,
    maex_recupera character varying(10),
    maex_recuperacual character varying(10),
    maex_orden integer DEFAULT 0,
    maex_estado character varying(15) DEFAULT 'ABIERTO'::character varying
);


ALTER TABLE public.materias_examenes OWNER TO postgres;

--
-- TOC entry 168 (class 1259 OID 17168)
-- Name: modulos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modulos (
    modu_id character varying(10) NOT NULL,
    modu_descripcion character varying(50) NOT NULL
);


ALTER TABLE public.modulos OWNER TO postgres;

--
-- TOC entry 169 (class 1259 OID 17171)
-- Name: nros_inscripcion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nros_inscripcion (
    nrin_id character varying(10) NOT NULL,
    nrin_idinscripcion character varying(10) NOT NULL,
    nrin_anio integer NOT NULL,
    nrin_nroinscripcion integer DEFAULT 0 NOT NULL,
    nrin_estado character varying(10) NOT NULL,
    nrin_descripcion character varying(70)
);


ALTER TABLE public.nros_inscripcion OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 17175)
-- Name: parametros; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parametros (
    para_id character varying(10) NOT NULL
);


ALTER TABLE public.parametros OWNER TO postgres;

--
-- TOC entry 171 (class 1259 OID 17178)
-- Name: pga_diagrams; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pga_diagrams (
    diagramname character varying(64) NOT NULL,
    diagramtables text,
    diagramlinks text
);


ALTER TABLE public.pga_diagrams OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 17184)
-- Name: pga_forms; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pga_forms (
    formname character varying(64) NOT NULL,
    formsource text
);


ALTER TABLE public.pga_forms OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 17190)
-- Name: pga_graphs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pga_graphs (
    graphname character varying(64) NOT NULL,
    graphsource text,
    graphcode text
);


ALTER TABLE public.pga_graphs OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 17196)
-- Name: pga_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pga_images (
    imagename character varying(64) NOT NULL,
    imagesource text
);


ALTER TABLE public.pga_images OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 17202)
-- Name: pga_layout; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pga_layout (
    tablename character varying(64) NOT NULL,
    nrcols smallint,
    colnames text,
    colwidth text
);


ALTER TABLE public.pga_layout OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 17208)
-- Name: pga_queries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pga_queries (
    queryname character varying(64) NOT NULL,
    querytype character(1),
    querycommand text,
    querytables text,
    querylinks text,
    queryresults text,
    querycomments text
);


ALTER TABLE public.pga_queries OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 17214)
-- Name: pga_reports; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pga_reports (
    reportname character varying(64) NOT NULL,
    reportsource text,
    reportbody text,
    reportprocs text,
    reportoptions text
);


ALTER TABLE public.pga_reports OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 17220)
-- Name: pga_scripts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pga_scripts (
    scriptname character varying(64) NOT NULL,
    scriptsource text
);


ALTER TABLE public.pga_scripts OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 17226)
-- Name: prueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.prueba (
    doc character varying(10)
);


ALTER TABLE public.prueba OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 17229)
-- Name: tipo_carrera; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_carrera (
    tica_id character varying(10) NOT NULL,
    tica_descripcion character varying(50) NOT NULL,
    tica_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.tipo_carrera OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 17233)
-- Name: turnos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.turnos (
    turn_id character varying(10) NOT NULL,
    turn_descripcion character varying(50) NOT NULL,
    turn_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.turnos OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 17237)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    usua_id character varying(10) NOT NULL,
    usua_user character varying(20) NOT NULL,
    usua_apellido character varying(70) NOT NULL,
    usua_nombre character varying(50) NOT NULL,
    usua_password character varying(50),
    usua_baja character varying(1) DEFAULT 0 NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 17241)
-- Name: usuarios_carrera; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios_carrera (
    usca_id character varying(10) NOT NULL,
    usca_idusuario character varying(10) NOT NULL,
    usca_idcarrera character varying(10) NOT NULL
);


ALTER TABLE public.usuarios_carrera OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 17244)
-- Name: usuarios_inscripcion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios_inscripcion (
    usin_id character varying(10) NOT NULL,
    usin_idusuario character varying(10) NOT NULL,
    usin_idinscripcion character varying(10) NOT NULL
);


ALTER TABLE public.usuarios_inscripcion OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 17247)
-- Name: usuarios_modulos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios_modulos (
    usmo_id character varying(10) NOT NULL,
    usmo_idusuario character varying(10) NOT NULL,
    usmo_idmodulo character varying(10) NOT NULL,
    usmo_alta character varying(1) NOT NULL,
    usmo_baja character varying(1) NOT NULL,
    usmo_modificacion character varying(1) NOT NULL,
    usmo_lectura character varying(1) NOT NULL
);


ALTER TABLE public.usuarios_modulos OWNER TO postgres;

--
-- TOC entry 2025 (class 2606 OID 24581)
-- Name: alumnos_examenes alumnos_examenes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumnos_examenes
    ADD CONSTRAINT alumnos_examenes_pkey PRIMARY KEY (alex_idinstanciaalumno, alex_idinstanciacurso, alex_idmateria, alex_idexamen);


--
-- TOC entry 2027 (class 2606 OID 24591)
-- Name: alumnos_materias alumnos_materias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumnos_materias
    ADD CONSTRAINT alumnos_materias_pkey PRIMARY KEY (alma_idinstanciaalumno, alma_idinstanciacurso, alma_idmateria);


--
-- TOC entry 1941 (class 2606 OID 17255)
-- Name: anexo anex_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.anexo
    ADD CONSTRAINT anex_id PRIMARY KEY (anex_id);


--
-- TOC entry 1945 (class 2606 OID 17257)
-- Name: carreras_anexo caan_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carreras_anexo
    ADD CONSTRAINT caan_id PRIMARY KEY (caan_id);


--
-- TOC entry 1947 (class 2606 OID 17259)
-- Name: carreras_modalidad camo_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carreras_modalidad
    ADD CONSTRAINT camo_id PRIMARY KEY (camo_id);


--
-- TOC entry 1943 (class 2606 OID 17261)
-- Name: carreras carr_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carreras
    ADD CONSTRAINT carr_id PRIMARY KEY (carr_id);


--
-- TOC entry 1949 (class 2606 OID 17263)
-- Name: carreras_turnos catu_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carreras_turnos
    ADD CONSTRAINT catu_id PRIMARY KEY (catu_id);


--
-- TOC entry 1951 (class 2606 OID 17265)
-- Name: colegios cole_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.colegios
    ADD CONSTRAINT cole_id PRIMARY KEY (cole_id);


--
-- TOC entry 2029 (class 2606 OID 24596)
-- Name: cursos_alumnos cursos_alumnos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cursos_alumnos
    ADD CONSTRAINT cursos_alumnos_pkey PRIMARY KEY (cual_idinstanciaalumno, cual_idinstanciacurso);


--
-- TOC entry 2031 (class 2606 OID 24603)
-- Name: cursos_materias cursos_materias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cursos_materias
    ADD CONSTRAINT cursos_materias_pkey PRIMARY KEY (cuma_idinstanciacurso, cuma_idmateria);


--
-- TOC entry 2033 (class 2606 OID 24608)
-- Name: cursos_presentismo cursos_presentismo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cursos_presentismo
    ADD CONSTRAINT cursos_presentismo_pkey PRIMARY KEY (cupr_idinstanciaalumno, cupr_idinstanciacurso, cupr_idmateria, cupr_fecha);


--
-- TOC entry 1953 (class 2606 OID 17271)
-- Name: datos_estudios daes_idinscripcion; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.datos_estudios
    ADD CONSTRAINT daes_idinscripcion PRIMARY KEY (daes_idinscripcion);


--
-- TOC entry 1955 (class 2606 OID 17273)
-- Name: datos_familia dafa_idinscripcion; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.datos_familia
    ADD CONSTRAINT dafa_idinscripcion PRIMARY KEY (dafa_idinscripcion);


--
-- TOC entry 1957 (class 2606 OID 17275)
-- Name: datos_inscripcion dain_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.datos_inscripcion
    ADD CONSTRAINT dain_id PRIMARY KEY (dain_id);


--
-- TOC entry 1959 (class 2606 OID 17277)
-- Name: datos_personales dape_idinscripcion; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.datos_personales
    ADD CONSTRAINT dape_idinscripcion PRIMARY KEY (dape_idinscripcion);


--
-- TOC entry 1961 (class 2606 OID 17279)
-- Name: datos_trabajo datr_idinscripcion; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.datos_trabajo
    ADD CONSTRAINT datr_idinscripcion PRIMARY KEY (datr_idinscripcion);


--
-- TOC entry 1983 (class 2606 OID 17281)
-- Name: instancias_anexos inan_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instancias_anexos
    ADD CONSTRAINT inan_id PRIMARY KEY (inan_id);


--
-- TOC entry 1981 (class 2606 OID 17283)
-- Name: inscripcion_carreras inca_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inscripcion_carreras
    ADD CONSTRAINT inca_id PRIMARY KEY (inca_id);


--
-- TOC entry 2035 (class 2606 OID 24617)
-- Name: instancia_cursos incu_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instancia_cursos
    ADD CONSTRAINT incu_id PRIMARY KEY (incu_id);


--
-- TOC entry 1985 (class 2606 OID 17287)
-- Name: instancias_materias inma_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instancias_materias
    ADD CONSTRAINT inma_id PRIMARY KEY (inma_id);


--
-- TOC entry 1987 (class 2606 OID 17289)
-- Name: instancias_modalidad inmo_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instancias_modalidad
    ADD CONSTRAINT inmo_id PRIMARY KEY (inmo_id);


--
-- TOC entry 1979 (class 2606 OID 17291)
-- Name: inscripcion insc_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inscripcion
    ADD CONSTRAINT insc_id PRIMARY KEY (insc_id);


--
-- TOC entry 1963 (class 2606 OID 17293)
-- Name: instancias inst_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instancias
    ADD CONSTRAINT inst_id PRIMARY KEY (inst_id);


--
-- TOC entry 1989 (class 2606 OID 17295)
-- Name: instancias_turnos intu_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instancias_turnos
    ADD CONSTRAINT intu_id PRIMARY KEY (intu_id);


--
-- TOC entry 1965 (class 2606 OID 17297)
-- Name: localidad loca_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.localidad
    ADD CONSTRAINT loca_id PRIMARY KEY (loca_id);


--
-- TOC entry 1991 (class 2606 OID 17301)
-- Name: materias mate_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materias
    ADD CONSTRAINT mate_id PRIMARY KEY (mate_id);


--
-- TOC entry 2037 (class 2606 OID 24624)
-- Name: materias_examenes materias_examenes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materias_examenes
    ADD CONSTRAINT materias_examenes_pkey PRIMARY KEY (maex_idinstanciacurso, maex_idmateria, maex_idexamen);


--
-- TOC entry 1967 (class 2606 OID 17303)
-- Name: modalidad moda_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modalidad
    ADD CONSTRAINT moda_id PRIMARY KEY (moda_id);


--
-- TOC entry 1993 (class 2606 OID 17305)
-- Name: modulos modu_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modulos
    ADD CONSTRAINT modu_id PRIMARY KEY (modu_id);


--
-- TOC entry 1995 (class 2606 OID 17307)
-- Name: nros_inscripcion nrin_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nros_inscripcion
    ADD CONSTRAINT nrin_id PRIMARY KEY (nrin_id);


--
-- TOC entry 1969 (class 2606 OID 17309)
-- Name: orientacion orie_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orientacion
    ADD CONSTRAINT orie_id PRIMARY KEY (orie_id);


--
-- TOC entry 1971 (class 2606 OID 17311)
-- Name: pais pais_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pais
    ADD CONSTRAINT pais_id PRIMARY KEY (pais_id);


--
-- TOC entry 1973 (class 2606 OID 17313)
-- Name: partido part_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.partido
    ADD CONSTRAINT part_id PRIMARY KEY (part_id);


--
-- TOC entry 1997 (class 2606 OID 17315)
-- Name: pga_diagrams pga_diagrams_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pga_diagrams
    ADD CONSTRAINT pga_diagrams_pkey PRIMARY KEY (diagramname);


--
-- TOC entry 1999 (class 2606 OID 17317)
-- Name: pga_forms pga_forms_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pga_forms
    ADD CONSTRAINT pga_forms_pkey PRIMARY KEY (formname);


--
-- TOC entry 2001 (class 2606 OID 17319)
-- Name: pga_graphs pga_graphs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pga_graphs
    ADD CONSTRAINT pga_graphs_pkey PRIMARY KEY (graphname);


--
-- TOC entry 2003 (class 2606 OID 17321)
-- Name: pga_images pga_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pga_images
    ADD CONSTRAINT pga_images_pkey PRIMARY KEY (imagename);


--
-- TOC entry 2005 (class 2606 OID 17323)
-- Name: pga_layout pga_layout_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pga_layout
    ADD CONSTRAINT pga_layout_pkey PRIMARY KEY (tablename);


--
-- TOC entry 2007 (class 2606 OID 17325)
-- Name: pga_queries pga_queries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pga_queries
    ADD CONSTRAINT pga_queries_pkey PRIMARY KEY (queryname);


--
-- TOC entry 2009 (class 2606 OID 17327)
-- Name: pga_reports pga_reports_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pga_reports
    ADD CONSTRAINT pga_reports_pkey PRIMARY KEY (reportname);


--
-- TOC entry 2011 (class 2606 OID 17329)
-- Name: pga_scripts pga_scripts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pga_scripts
    ADD CONSTRAINT pga_scripts_pkey PRIMARY KEY (scriptname);


--
-- TOC entry 1975 (class 2606 OID 17331)
-- Name: provincias prov_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.provincias
    ADD CONSTRAINT prov_id PRIMARY KEY (prov_id);


--
-- TOC entry 2013 (class 2606 OID 17333)
-- Name: tipo_carrera tica_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_carrera
    ADD CONSTRAINT tica_id PRIMARY KEY (tica_id);


--
-- TOC entry 1977 (class 2606 OID 17335)
-- Name: titulos titu_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.titulos
    ADD CONSTRAINT titu_id PRIMARY KEY (titu_id);


--
-- TOC entry 2015 (class 2606 OID 17337)
-- Name: turnos turn_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turnos
    ADD CONSTRAINT turn_id PRIMARY KEY (turn_id);


--
-- TOC entry 2019 (class 2606 OID 17339)
-- Name: usuarios_carrera usca_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios_carrera
    ADD CONSTRAINT usca_id PRIMARY KEY (usca_id);


--
-- TOC entry 2021 (class 2606 OID 17341)
-- Name: usuarios_inscripcion usin_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios_inscripcion
    ADD CONSTRAINT usin_id PRIMARY KEY (usin_id);


--
-- TOC entry 2023 (class 2606 OID 17343)
-- Name: usuarios_modulos usmo_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios_modulos
    ADD CONSTRAINT usmo_id PRIMARY KEY (usmo_id);


--
-- TOC entry 2017 (class 2606 OID 17345)
-- Name: usuarios usua_id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usua_id PRIMARY KEY (usua_id);


--
-- TOC entry 2131 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2020-09-29 12:18:09

--
-- PostgreSQL database dump complete
--

