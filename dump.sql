--
-- PostgreSQL database dump
--

\restrict cNtYlWj02AIGCzXCrAcf42t8LkRr2m9FQadS5cHaj9vqV1OU0KcDxlfUQVcfywV

-- Dumped from database version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admins; Type: TABLE; Schema: public; Owner: sophelle_user
--

CREATE TABLE public.admins (
    id integer NOT NULL,
    usuario character varying(50) NOT NULL,
    senha character varying(100) NOT NULL
);


ALTER TABLE public.admins OWNER TO sophelle_user;

--
-- Name: admins_id_seq; Type: SEQUENCE; Schema: public; Owner: sophelle_user
--

CREATE SEQUENCE public.admins_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.admins_id_seq OWNER TO sophelle_user;

--
-- Name: admins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sophelle_user
--

ALTER SEQUENCE public.admins_id_seq OWNED BY public.admins.id;


--
-- Name: agendamentos; Type: TABLE; Schema: public; Owner: sophelle_user
--

CREATE TABLE public.agendamentos (
    id integer NOT NULL,
    cliente character varying(100),
    servico character varying(100),
    data date,
    horario time without time zone,
    status character varying(30),
    cliente_id integer,
    horarios time without time zone
);


ALTER TABLE public.agendamentos OWNER TO sophelle_user;

--
-- Name: agendamentos_id_seq; Type: SEQUENCE; Schema: public; Owner: sophelle_user
--

CREATE SEQUENCE public.agendamentos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.agendamentos_id_seq OWNER TO sophelle_user;

--
-- Name: agendamentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sophelle_user
--

ALTER SEQUENCE public.agendamentos_id_seq OWNED BY public.agendamentos.id;


--
-- Name: clientes; Type: TABLE; Schema: public; Owner: sophelle_user
--

CREATE TABLE public.clientes (
    id integer NOT NULL,
    nome character varying(100),
    telefone character varying(20),
    email character varying(100),
    senha character varying(100) DEFAULT ''::character varying NOT NULL
);


ALTER TABLE public.clientes OWNER TO sophelle_user;

--
-- Name: clientes_id_seq; Type: SEQUENCE; Schema: public; Owner: sophelle_user
--

CREATE SEQUENCE public.clientes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.clientes_id_seq OWNER TO sophelle_user;

--
-- Name: clientes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sophelle_user
--

ALTER SEQUENCE public.clientes_id_seq OWNED BY public.clientes.id;


--
-- Name: horarios_disponiveis; Type: TABLE; Schema: public; Owner: sophelle_user
--

CREATE TABLE public.horarios_disponiveis (
    id integer NOT NULL,
    data date NOT NULL,
    horario time without time zone NOT NULL,
    disponivel boolean DEFAULT true
);


ALTER TABLE public.horarios_disponiveis OWNER TO sophelle_user;

--
-- Name: horarios_disponiveis_id_seq; Type: SEQUENCE; Schema: public; Owner: sophelle_user
--

CREATE SEQUENCE public.horarios_disponiveis_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.horarios_disponiveis_id_seq OWNER TO sophelle_user;

--
-- Name: horarios_disponiveis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sophelle_user
--

ALTER SEQUENCE public.horarios_disponiveis_id_seq OWNED BY public.horarios_disponiveis.id;


--
-- Name: admins id; Type: DEFAULT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.admins ALTER COLUMN id SET DEFAULT nextval('public.admins_id_seq'::regclass);


--
-- Name: agendamentos id; Type: DEFAULT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.agendamentos ALTER COLUMN id SET DEFAULT nextval('public.agendamentos_id_seq'::regclass);


--
-- Name: clientes id; Type: DEFAULT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.clientes ALTER COLUMN id SET DEFAULT nextval('public.clientes_id_seq'::regclass);


--
-- Name: horarios_disponiveis id; Type: DEFAULT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.horarios_disponiveis ALTER COLUMN id SET DEFAULT nextval('public.horarios_disponiveis_id_seq'::regclass);


--
-- Data for Name: admins; Type: TABLE DATA; Schema: public; Owner: sophelle_user
--

COPY public.admins (id, usuario, senha) FROM stdin;
1	admin	123456
2	sophie.carvalho@gmail.com	123456
\.


--
-- Data for Name: agendamentos; Type: TABLE DATA; Schema: public; Owner: sophelle_user
--

COPY public.agendamentos (id, cliente, servico, data, horario, status, cliente_id, horarios) FROM stdin;
1	\N	Manicure	2026-10-10	15:00:00	Concluído	1	\N
3	\N	Banho de Gel	2026-10-20	14:30:00	Pendente	3	\N
2	\N	Manicure	2026-10-23	14:50:00	Cancelado	2	\N
4	\N	Pedicure	2026-10-24	15:00:00	Pendente	2	\N
\.


--
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: sophelle_user
--

COPY public.clientes (id, nome, telefone, email, senha) FROM stdin;
1	isa	19 9349455	isa@gmail.com	22
2	Manuela	19 926172927	manuela@gmail.com	123456
3	Naiara	19 92758010	naiaragomes@gmail.com	123456
\.


--
-- Data for Name: horarios_disponiveis; Type: TABLE DATA; Schema: public; Owner: sophelle_user
--

COPY public.horarios_disponiveis (id, data, horario, disponivel) FROM stdin;
1	2026-10-17	14:00:00	f
2	2026-10-17	16:00:00	t
3	2026-10-09	15:00:00	t
4	2026-10-21	13:00:00	t
\.


--
-- Name: admins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sophelle_user
--

SELECT pg_catalog.setval('public.admins_id_seq', 2, true);


--
-- Name: agendamentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sophelle_user
--

SELECT pg_catalog.setval('public.agendamentos_id_seq', 4, true);


--
-- Name: clientes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sophelle_user
--

SELECT pg_catalog.setval('public.clientes_id_seq', 3, true);


--
-- Name: horarios_disponiveis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sophelle_user
--

SELECT pg_catalog.setval('public.horarios_disponiveis_id_seq', 4, true);


--
-- Name: admins admins_pkey; Type: CONSTRAINT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_pkey PRIMARY KEY (id);


--
-- Name: admins admins_usuario_key; Type: CONSTRAINT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_usuario_key UNIQUE (usuario);


--
-- Name: agendamentos agendamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.agendamentos
    ADD CONSTRAINT agendamentos_pkey PRIMARY KEY (id);


--
-- Name: clientes clientes_pkey; Type: CONSTRAINT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id);


--
-- Name: horarios_disponiveis horarios_disponiveis_pkey; Type: CONSTRAINT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.horarios_disponiveis
    ADD CONSTRAINT horarios_disponiveis_pkey PRIMARY KEY (id);


--
-- Name: agendamentos agendamentos_cliente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sophelle_user
--

ALTER TABLE ONLY public.agendamentos
    ADD CONSTRAINT agendamentos_cliente_id_fkey FOREIGN KEY (cliente_id) REFERENCES public.clientes(id);


--
-- PostgreSQL database dump complete
--

\unrestrict cNtYlWj02AIGCzXCrAcf42t8LkRr2m9FQadS5cHaj9vqV1OU0KcDxlfUQVcfywV

