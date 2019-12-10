--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.14
-- Dumped by pg_dump version 9.5.14

-- Started on 2019-12-04 14:08:17

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12355)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2326 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 193 (class 1259 OID 34360)
-- Name: areas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.areas (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    description text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.areas OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 34358)
-- Name: areas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.areas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.areas_id_seq OWNER TO postgres;

--
-- TOC entry 2327 (class 0 OID 0)
-- Dependencies: 192
-- Name: areas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.areas_id_seq OWNED BY public.areas.id;


--
-- TOC entry 208 (class 1259 OID 34490)
-- Name: article_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.article_images (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    ext text NOT NULL,
    path text NOT NULL,
    article_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.article_images OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 34488)
-- Name: article_images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.article_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.article_images_id_seq OWNER TO postgres;

--
-- TOC entry 2328 (class 0 OID 0)
-- Dependencies: 207
-- Name: article_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.article_images_id_seq OWNED BY public.article_images.id;


--
-- TOC entry 206 (class 1259 OID 34474)
-- Name: articles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.articles (
    id integer NOT NULL,
    article_title character varying(255) NOT NULL,
    article_author character varying(255) NOT NULL,
    article_keywords character varying(255) NOT NULL,
    article_content text NOT NULL,
    article_bibliography character varying(255) NOT NULL,
    user_id integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.articles OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 34472)
-- Name: articles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.articles_id_seq OWNER TO postgres;

--
-- TOC entry 2329 (class 0 OID 0)
-- Dependencies: 205
-- Name: articles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.articles_id_seq OWNED BY public.articles.id;


--
-- TOC entry 212 (class 1259 OID 34522)
-- Name: bulletins; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bulletins (
    id integer NOT NULL,
    bulletin_title character varying(255) NOT NULL,
    bulletin_vol character varying(255) NOT NULL,
    ext text NOT NULL,
    path text NOT NULL,
    path_cover text NOT NULL,
    path_pdf text NOT NULL,
    published text NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.bulletins OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 34520)
-- Name: bulletins_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bulletins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bulletins_id_seq OWNER TO postgres;

--
-- TOC entry 2330 (class 0 OID 0)
-- Dependencies: 211
-- Name: bulletins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bulletins_id_seq OWNED BY public.bulletins.id;


--
-- TOC entry 204 (class 1259 OID 34458)
-- Name: images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.images (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    ext text NOT NULL,
    path text NOT NULL,
    letter_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.images OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 34456)
-- Name: images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.images_id_seq OWNER TO postgres;

--
-- TOC entry 2331 (class 0 OID 0)
-- Dependencies: 203
-- Name: images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.images_id_seq OWNED BY public.images.id;


--
-- TOC entry 202 (class 1259 OID 34436)
-- Name: letters; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.letters (
    id integer NOT NULL,
    letter_greeting character varying(255) NOT NULL,
    letter_content text NOT NULL,
    letter_farewell text,
    readed boolean DEFAULT false NOT NULL,
    area_id integer NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.letters OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 34434)
-- Name: letters_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.letters_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.letters_id_seq OWNER TO postgres;

--
-- TOC entry 2332 (class 0 OID 0)
-- Dependencies: 201
-- Name: letters_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.letters_id_seq OWNED BY public.letters.id;


--
-- TOC entry 182 (class 1259 OID 32308)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 32306)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 2333 (class 0 OID 0)
-- Dependencies: 181
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 213 (class 1259 OID 34536)
-- Name: notifications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.notifications (
    id uuid NOT NULL,
    type character varying(255) NOT NULL,
    notifiable_id integer NOT NULL,
    notifiable_type character varying(255) NOT NULL,
    data text NOT NULL,
    readed boolean DEFAULT false NOT NULL,
    read_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.notifications OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 34312)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 34381)
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permissions (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 34379)
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permissions_id_seq OWNER TO postgres;

--
-- TOC entry 2334 (class 0 OID 0)
-- Dependencies: 196
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- TOC entry 191 (class 1259 OID 34347)
-- Name: redactors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.redactors (
    id integer NOT NULL,
    firstname character varying(255) NOT NULL,
    lastname character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    birthdate date NOT NULL,
    email character varying(255) NOT NULL,
    ci character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.redactors OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 34345)
-- Name: redactors_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.redactors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.redactors_id_seq OWNER TO postgres;

--
-- TOC entry 2335 (class 0 OID 0)
-- Dependencies: 190
-- Name: redactors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.redactors_id_seq OWNED BY public.redactors.id;


--
-- TOC entry 200 (class 1259 OID 34419)
-- Name: role_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.role_has_permissions (
    permission_id integer NOT NULL,
    role_id integer NOT NULL
);


ALTER TABLE public.role_has_permissions OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 34371)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 34369)
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO postgres;

--
-- TOC entry 2336 (class 0 OID 0)
-- Dependencies: 194
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- TOC entry 187 (class 1259 OID 34321)
-- Name: suscriptors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.suscriptors (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    lastname character varying(255) NOT NULL,
    ci character varying(255) NOT NULL,
    city character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.suscriptors OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 34319)
-- Name: suscriptors_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.suscriptors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.suscriptors_id_seq OWNER TO postgres;

--
-- TOC entry 2337 (class 0 OID 0)
-- Dependencies: 186
-- Name: suscriptors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.suscriptors_id_seq OWNED BY public.suscriptors.id;


--
-- TOC entry 210 (class 1259 OID 34506)
-- Name: templates; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.templates (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    ext text NOT NULL,
    path text NOT NULL,
    path_cover text NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.templates OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 34504)
-- Name: templates_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.templates_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.templates_id_seq OWNER TO postgres;

--
-- TOC entry 2338 (class 0 OID 0)
-- Dependencies: 209
-- Name: templates_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.templates_id_seq OWNED BY public.templates.id;


--
-- TOC entry 198 (class 1259 OID 34389)
-- Name: user_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_has_permissions (
    user_id integer NOT NULL,
    permission_id integer NOT NULL
);


ALTER TABLE public.user_has_permissions OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 34404)
-- Name: user_has_roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_has_roles (
    role_id integer NOT NULL,
    user_id integer NOT NULL
);


ALTER TABLE public.user_has_roles OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 34301)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    firstname character varying(255) NOT NULL,
    lastname character varying(255),
    username character varying(255),
    email character varying(255) NOT NULL,
    ci character varying(255),
    phone character varying(255),
    address character varying(255),
    birthdate character varying(255),
    area_id character varying(255),
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 34299)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 2339 (class 0 OID 0)
-- Dependencies: 183
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 189 (class 1259 OID 34334)
-- Name: writers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.writers (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    lastname character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.writers OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 34332)
-- Name: writers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.writers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.writers_id_seq OWNER TO postgres;

--
-- TOC entry 2340 (class 0 OID 0)
-- Dependencies: 188
-- Name: writers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.writers_id_seq OWNED BY public.writers.id;


--
-- TOC entry 2097 (class 2604 OID 34363)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areas ALTER COLUMN id SET DEFAULT nextval('public.areas_id_seq'::regclass);


--
-- TOC entry 2104 (class 2604 OID 34493)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.article_images ALTER COLUMN id SET DEFAULT nextval('public.article_images_id_seq'::regclass);


--
-- TOC entry 2103 (class 2604 OID 34477)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles ALTER COLUMN id SET DEFAULT nextval('public.articles_id_seq'::regclass);


--
-- TOC entry 2106 (class 2604 OID 34525)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bulletins ALTER COLUMN id SET DEFAULT nextval('public.bulletins_id_seq'::regclass);


--
-- TOC entry 2102 (class 2604 OID 34461)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.images ALTER COLUMN id SET DEFAULT nextval('public.images_id_seq'::regclass);


--
-- TOC entry 2100 (class 2604 OID 34439)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.letters ALTER COLUMN id SET DEFAULT nextval('public.letters_id_seq'::regclass);


--
-- TOC entry 2092 (class 2604 OID 32311)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2099 (class 2604 OID 34384)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- TOC entry 2096 (class 2604 OID 34350)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.redactors ALTER COLUMN id SET DEFAULT nextval('public.redactors_id_seq'::regclass);


--
-- TOC entry 2098 (class 2604 OID 34374)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- TOC entry 2094 (class 2604 OID 34324)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.suscriptors ALTER COLUMN id SET DEFAULT nextval('public.suscriptors_id_seq'::regclass);


--
-- TOC entry 2105 (class 2604 OID 34509)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.templates ALTER COLUMN id SET DEFAULT nextval('public.templates_id_seq'::regclass);


--
-- TOC entry 2093 (class 2604 OID 34304)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 2095 (class 2604 OID 34337)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.writers ALTER COLUMN id SET DEFAULT nextval('public.writers_id_seq'::regclass);


--
-- TOC entry 2297 (class 0 OID 34360)
-- Dependencies: 193
-- Data for Name: areas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.areas (id, name, slug, description, created_at, updated_at) FROM stdin;
1	Deportes	Deportes	El futbol es uno de los deportes mas practicados del mundo	2019-12-04 16:57:25	2019-12-04 16:57:25
2	Economia	Economia	La economia es la ciencia que estudia los recursos, la creación de riqueza y la producción, distribución y consumo de bienes y servicios, para satisfacer las necesidades humanas	2019-12-04 16:57:56	2019-12-04 16:57:56
3	Filosofia	Filosofia	Los filosofos hacen que nuestro cebrero se confunda	2019-12-04 16:58:32	2019-12-04 16:58:32
\.


--
-- TOC entry 2341 (class 0 OID 0)
-- Dependencies: 192
-- Name: areas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.areas_id_seq', 3, true);


--
-- TOC entry 2312 (class 0 OID 34490)
-- Dependencies: 208
-- Data for Name: article_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.article_images (id, name, ext, path, article_id, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2342 (class 0 OID 0)
-- Dependencies: 207
-- Name: article_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.article_images_id_seq', 1, false);


--
-- TOC entry 2310 (class 0 OID 34474)
-- Dependencies: 206
-- Data for Name: articles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.articles (id, article_title, article_author, article_keywords, article_content, article_bibliography, user_id, remember_token, created_at, updated_at) FROM stdin;
1	deporte	jose vargas	keywords	<p>hola como estas</p>	bibliografia	7	\N	2019-12-04 17:32:41	2019-12-04 17:32:41
\.


--
-- TOC entry 2343 (class 0 OID 0)
-- Dependencies: 205
-- Name: articles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.articles_id_seq', 1, true);


--
-- TOC entry 2316 (class 0 OID 34522)
-- Dependencies: 212
-- Data for Name: bulletins; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bulletins (id, bulletin_title, bulletin_vol, ext, path, path_cover, path_pdf, published, user_id, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2344 (class 0 OID 0)
-- Dependencies: 211
-- Name: bulletins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bulletins_id_seq', 1, false);


--
-- TOC entry 2308 (class 0 OID 34458)
-- Dependencies: 204
-- Data for Name: images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.images (id, name, ext, path, letter_id, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2345 (class 0 OID 0)
-- Dependencies: 203
-- Name: images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.images_id_seq', 1, false);


--
-- TOC entry 2306 (class 0 OID 34436)
-- Dependencies: 202
-- Data for Name: letters; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.letters (id, letter_greeting, letter_content, letter_farewell, readed, area_id, user_id, created_at, updated_at) FROM stdin;
1	buenas tardes	los jugadores de bolivar tienen una velocidad increible y buena vision	\N	f	1	11	2019-12-04 17:07:43	2019-12-04 17:07:43
2	hola	la economia de bolivia esta en caida pero los paises de venezuela y argentina esta mal la economia sufren de trabajo y dinero	\N	f	1	11	2019-12-04 17:09:35	2019-12-04 17:09:35
3	hola	todos lo pobres sufren por la falta de dinero	\N	f	2	11	2019-12-04 17:12:00	2019-12-04 17:12:00
\.


--
-- TOC entry 2346 (class 0 OID 0)
-- Dependencies: 201
-- Name: letters_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.letters_id_seq', 3, true);


--
-- TOC entry 2286 (class 0 OID 32308)
-- Dependencies: 182
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
113	2014_10_12_000000_create_users_table	1
114	2014_10_12_100000_create_password_resets_table	1
115	2019_09_10_210258_CreateSuscriptorsTable	1
116	2019_09_12_040722_CreateWritersTable	1
117	2019_09_12_185624_CreateRedactorsTable	1
118	2019_09_13_180730_CreateAreasTable	1
119	2019_09_18_144929_create_permission_tables	1
120	2019_09_29_015057_CreateLettersTable	1
121	2019_09_29_015541_CreateimagesTable	1
122	2019_10_08_195912_CreateArticlesTable	1
123	2019_10_11_223257_CreateArticleImagesTable	1
124	2019_10_11_232247_CreateTemplatesTable	1
125	2019_10_11_243257_CreateBulletinsTable	1
126	2019_11_27_032631_create_notifications_table	1
\.


--
-- TOC entry 2347 (class 0 OID 0)
-- Dependencies: 181
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 126, true);


--
-- TOC entry 2317 (class 0 OID 34536)
-- Dependencies: 213
-- Data for Name: notifications; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.notifications (id, type, notifiable_id, notifiable_type, data, readed, read_at, created_at, updated_at) FROM stdin;
8e5576ec-772d-4813-85e5-510610836246	App\\Notifications\\NewLetter	2	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:07:43.823276","timezone_type":3,"timezone":"UTC"},"letter_id":1}	f	\N	2019-12-04 17:07:43	2019-12-04 17:07:43
f00fe0f6-c2b8-403a-be71-404af9fd65c6	App\\Notifications\\NewLetter	2	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:09:35.745089","timezone_type":3,"timezone":"UTC"},"letter_id":2}	f	\N	2019-12-04 17:09:35	2019-12-04 17:09:35
7a79270f-c141-4b06-a019-b4cc610eccd9	App\\Notifications\\NewLetter	8	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:09:35.756601","timezone_type":3,"timezone":"UTC"},"letter_id":2}	f	2019-12-04 17:10:59	2019-12-04 17:09:35	2019-12-04 17:10:59
fad6934f-088b-4d93-bd1f-ba5097ef90be	App\\Notifications\\NewLetter	8	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:07:43.832008","timezone_type":3,"timezone":"UTC"},"letter_id":1}	f	2019-12-04 17:10:59	2019-12-04 17:07:43	2019-12-04 17:10:59
13c5e399-2b9e-4905-ba2b-eec46e045fcb	App\\Notifications\\NewLetter	9	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:09:35.759606","timezone_type":3,"timezone":"UTC"},"letter_id":2}	f	2019-12-04 17:11:12	2019-12-04 17:09:35	2019-12-04 17:11:12
df8c9b56-b304-4451-a61b-501ffdeb1f95	App\\Notifications\\NewLetter	9	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:07:43.835976","timezone_type":3,"timezone":"UTC"},"letter_id":1}	f	2019-12-04 17:11:12	2019-12-04 17:07:43	2019-12-04 17:11:12
540cf8a6-6915-4f9b-b03a-a314314c6d01	App\\Notifications\\NewLetter	7	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:09:35.753688","timezone_type":3,"timezone":"UTC"},"letter_id":2}	f	2019-12-04 17:11:25	2019-12-04 17:09:35	2019-12-04 17:11:25
d76f0ad8-83e6-4950-be54-dfcb1d1b5d9d	App\\Notifications\\NewLetter	7	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:07:43.829425","timezone_type":3,"timezone":"UTC"},"letter_id":1}	f	2019-12-04 17:11:25	2019-12-04 17:07:43	2019-12-04 17:11:25
cf3f3b18-73f4-4341-9741-d2700a552b8e	App\\Notifications\\NewLetter	2	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:12:00.335409","timezone_type":3,"timezone":"UTC"},"letter_id":3}	f	\N	2019-12-04 17:12:00	2019-12-04 17:12:00
582f4be8-e7e4-4bba-a8d8-bd7e0960da09	App\\Notifications\\NewLetter	7	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:12:00.340205","timezone_type":3,"timezone":"UTC"},"letter_id":3}	f	\N	2019-12-04 17:12:00	2019-12-04 17:12:00
440e7a79-50c7-4118-8c41-1d994d612897	App\\Notifications\\NewLetter	8	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:12:00.342920","timezone_type":3,"timezone":"UTC"},"letter_id":3}	f	\N	2019-12-04 17:12:00	2019-12-04 17:12:00
77d8dfe6-e518-47d4-bd9b-7055d27ef531	App\\Notifications\\NewLetter	9	App\\User	{"username":"daniel ","date":{"date":"2019-12-04 17:12:00.345325","timezone_type":3,"timezone":"UTC"},"letter_id":3}	f	\N	2019-12-04 17:12:00	2019-12-04 17:12:00
\.


--
-- TOC entry 2289 (class 0 OID 34312)
-- Dependencies: 185
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 2301 (class 0 OID 34381)
-- Dependencies: 197
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.permissions (id, name, created_at, updated_at) FROM stdin;
1	backend access	2019-12-04 16:56:36	2019-12-04 16:56:36
2	list users	2019-12-04 16:56:36	2019-12-04 16:56:36
3	create users	2019-12-04 16:56:36	2019-12-04 16:56:36
4	edit users	2019-12-04 16:56:36	2019-12-04 16:56:36
5	delete users	2019-12-04 16:56:36	2019-12-04 16:56:36
6	list roles	2019-12-04 16:56:36	2019-12-04 16:56:36
7	create roles	2019-12-04 16:56:36	2019-12-04 16:56:36
8	edit roles	2019-12-04 16:56:36	2019-12-04 16:56:36
9	delete roles	2019-12-04 16:56:36	2019-12-04 16:56:36
10	list writers	2019-12-04 16:56:36	2019-12-04 16:56:36
11	create writers	2019-12-04 16:56:36	2019-12-04 16:56:36
12	edit writers	2019-12-04 16:56:36	2019-12-04 16:56:36
13	delete writers	2019-12-04 16:56:36	2019-12-04 16:56:36
14	list redactors	2019-12-04 16:56:36	2019-12-04 16:56:36
15	create redactors	2019-12-04 16:56:36	2019-12-04 16:56:36
16	edit redactors	2019-12-04 16:56:36	2019-12-04 16:56:36
17	delete redactors	2019-12-04 16:56:36	2019-12-04 16:56:36
18	list suscriptors	2019-12-04 16:56:36	2019-12-04 16:56:36
19	create suscriptors	2019-12-04 16:56:36	2019-12-04 16:56:36
20	edit suscriptors	2019-12-04 16:56:37	2019-12-04 16:56:37
21	delete suscriptors	2019-12-04 16:56:37	2019-12-04 16:56:37
22	list areas	2019-12-04 16:56:37	2019-12-04 16:56:37
23	create areas	2019-12-04 16:56:37	2019-12-04 16:56:37
24	edit areas	2019-12-04 16:56:37	2019-12-04 16:56:37
25	delete areas	2019-12-04 16:56:37	2019-12-04 16:56:37
26	list letters	2019-12-04 16:56:37	2019-12-04 16:56:37
27	create letters	2019-12-04 16:56:37	2019-12-04 16:56:37
28	show letters	2019-12-04 16:56:37	2019-12-04 16:56:37
29	edit letters	2019-12-04 16:56:37	2019-12-04 16:56:37
30	delete letters	2019-12-04 16:56:37	2019-12-04 16:56:37
31	list articles	2019-12-04 16:56:37	2019-12-04 16:56:37
32	create articles	2019-12-04 16:56:37	2019-12-04 16:56:37
33	show articles	2019-12-04 16:56:37	2019-12-04 16:56:37
34	edit articles	2019-12-04 16:56:37	2019-12-04 16:56:37
35	delete articles	2019-12-04 16:56:37	2019-12-04 16:56:37
36	list templates	2019-12-04 16:56:37	2019-12-04 16:56:37
37	create templates	2019-12-04 16:56:37	2019-12-04 16:56:37
38	show templates	2019-12-04 16:56:37	2019-12-04 16:56:37
39	edit templates	2019-12-04 16:56:37	2019-12-04 16:56:37
40	delete templates	2019-12-04 16:56:37	2019-12-04 16:56:37
41	list bulletins	2019-12-04 16:56:37	2019-12-04 16:56:37
42	create bulletins	2019-12-04 16:56:37	2019-12-04 16:56:37
43	show bulletins	2019-12-04 16:56:37	2019-12-04 16:56:37
44	edit bulletins	2019-12-04 16:56:37	2019-12-04 16:56:37
45	publish bulletins	2019-12-04 16:56:37	2019-12-04 16:56:37
46	delete bulletins	2019-12-04 16:56:37	2019-12-04 16:56:37
47	train machine	2019-12-04 16:56:37	2019-12-04 16:56:37
\.


--
-- TOC entry 2348 (class 0 OID 0)
-- Dependencies: 196
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permissions_id_seq', 47, true);


--
-- TOC entry 2295 (class 0 OID 34347)
-- Dependencies: 191
-- Data for Name: redactors; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.redactors (id, firstname, lastname, username, birthdate, email, ci, phone, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2349 (class 0 OID 0)
-- Dependencies: 190
-- Name: redactors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.redactors_id_seq', 1, false);


--
-- TOC entry 2304 (class 0 OID 34419)
-- Dependencies: 200
-- Data for Name: role_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.role_has_permissions (permission_id, role_id) FROM stdin;
2	1
3	1
4	1
5	1
6	1
7	1
8	1
9	1
10	1
11	1
12	1
13	1
14	1
15	1
16	1
17	1
18	1
19	1
20	1
21	1
22	1
23	1
24	1
25	1
26	1
27	1
28	1
29	1
30	1
31	1
32	1
33	1
34	1
35	1
36	1
37	1
38	1
39	1
40	1
41	1
42	1
43	1
44	1
45	1
46	1
47	1
26	2
27	2
29	2
28	2
30	2
26	3
28	3
22	3
23	3
24	3
47	3
31	3
33	3
32	3
34	3
35	3
31	4
33	4
41	4
43	4
42	4
44	4
45	4
36	4
38	4
\.


--
-- TOC entry 2299 (class 0 OID 34371)
-- Dependencies: 195
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id, name, created_at, updated_at) FROM stdin;
1	admin	2019-12-04 16:56:35	2019-12-04 16:56:35
2	writer	2019-12-04 16:56:35	2019-12-04 16:56:35
3	redactor	2019-12-04 16:56:35	2019-12-04 16:56:35
4	editor	2019-12-04 16:56:35	2019-12-04 16:56:35
\.


--
-- TOC entry 2350 (class 0 OID 0)
-- Dependencies: 194
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_seq', 4, true);


--
-- TOC entry 2291 (class 0 OID 34321)
-- Dependencies: 187
-- Data for Name: suscriptors; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.suscriptors (id, name, lastname, ci, city, email, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2351 (class 0 OID 0)
-- Dependencies: 186
-- Name: suscriptors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.suscriptors_id_seq', 1, false);


--
-- TOC entry 2314 (class 0 OID 34506)
-- Dependencies: 210
-- Data for Name: templates; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.templates (id, name, ext, path, path_cover, user_id, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2352 (class 0 OID 0)
-- Dependencies: 209
-- Name: templates_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.templates_id_seq', 1, false);


--
-- TOC entry 2302 (class 0 OID 34389)
-- Dependencies: 198
-- Data for Name: user_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.user_has_permissions (user_id, permission_id) FROM stdin;
1	1
2	1
3	1
4	1
5	1
6	1
7	1
8	1
9	1
10	1
\.


--
-- TOC entry 2303 (class 0 OID 34404)
-- Dependencies: 199
-- Data for Name: user_has_roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.user_has_roles (role_id, user_id) FROM stdin;
1	1
3	2
2	3
2	4
2	5
4	6
3	7
3	8
3	9
2	10
2	11
4	12
4	13
\.


--
-- TOC entry 2288 (class 0 OID 34301)
-- Dependencies: 184
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, firstname, lastname, username, email, ci, phone, address, birthdate, area_id, password, remember_token, created_at, updated_at) FROM stdin;
2	Juan Carlos	Cabrera	juan	juancarlos@gmail.com	0123456987AD	+59144444444	\N	2019-12-04 16:56:35	\N	$2y$10$q4uSgBox3PgBmjnHCMGCfe8bVxGvNLpCCIC7/FbZJ1Bzgfe8LRi9W		2019-12-04 16:56:36	2019-12-04 16:56:36
3	Bart	Simpson	bartsimpson	bart@gmail.com	0123456987AD	+59144444444	\N	2019-12-04 16:56:35	\N	$2y$10$CzlHtERPwDYMzzNYRTbbIusfCyDs/uF4Bty.C5O8OqL5infDCKVlC		2019-12-04 16:56:36	2019-12-04 16:56:36
4	Homero	Simpson	homerosimpson	HOMERO@gmail.com	AV454545454	+591123456789	\N	2019-12-04 16:56:36	\N	$2y$10$8.GtLkrebe7jJ9WEahMODeN.QQsiuScVsZGHZKjrfAuqL9cX.aHuK		2019-12-04 16:56:36	2019-12-04 16:56:36
5	Otto	Mann	otto	otto@gmail.com	0123456987AD	+59195159525	\N	2019-12-04 16:56:36	\N	$2y$10$tHZ0Q0egLkDVQUPr.GPJo.RBl3YbPrEQ0vnA7OvwFEUHFdCTITPgu		2019-12-04 16:56:36	2019-12-04 16:56:36
6	Seymour	Skinner	seymour	seymour@gmail.com	OKK45462582	+59113456798	\N	2019-12-04 16:56:36	\N	$2y$10$nYEPhbuykOciPnSigO.rLequlr7B7CQHPuY4ZuD2TbvTqCh9mjU0q		2019-12-04 16:56:36	2019-12-04 16:56:36
7	jose	vargas	joseV	jose@gmail.com	45454574545	4578764678	\N	2019-12-04	1	$2y$10$9.j25aGfE/a.nABkN76bHuqKSd8gQhc8ERpkv.58Z6OydsNjHGKD2	\N	2019-12-04 16:59:27	2019-12-04 16:59:27
8	Mario	lopez	MarioL`	mario@gmail.com	54545454545	64645455	\N	2019-12-04	2	$2y$10$Nxjgkqz1zEfD1xmwHPJSQulhc5tMbuUObH.12WBMT9xpn3p513tU2	\N	2019-12-04 17:00:25	2019-12-04 17:00:25
9	Rosa	Condori	RosaC	rosa@gmail.com	454545454	545454545	\N	2019-12-04	3	$2y$10$eW3/Dw8XGY6JyvCNSx5lL.rEW0Q.sJPxUtIc27kGkFklikqHx/5HC	\N	2019-12-04 17:01:23	2019-12-04 17:01:23
10	lucas	suarez	\N	lucas@gmail.com	\N	\N	\N	\N	\N	$2y$10$neadR2J00LQDLA1tmWUMyunEWgwq3P1lcJj419XteasGIb/PmbuVK	\N	2019-12-04 17:02:15	2019-12-04 17:02:15
1	Carlos	Veizaga	Admin	admin@admin.com	0123456987AD	+59144444444	\N	2019-12-04 16:56:35	\N	$2y$10$B/LZLZgORW8o7wYt1Gn38uT81QCDUa2U7zrm/6m1aTTUGDq/H/wEu	VgMV7fgWJM1FRef1hcmFlfEza4Hiwvak5VXZorOQRIZsY1r2bRAqbP71uzoo	2019-12-04 16:56:36	2019-12-04 16:56:36
11	daniel	\N	\N	daniel@email.com	\N	\N	\N	\N	\N	$2y$10$fX5ueSGEkp6gXpD4zJnvJ.vuUpONS3q8LqrhQ2lDtYPOChd3Om766	QuzeWsJOFa7JQNxXtjlYlUHId7m6FGdbh7s5c3xTLUcVCENzp7JJArfRrmuv	2019-12-04 17:06:39	2019-12-04 17:06:39
12	Roger	Mendoza	\N	roger@gmail.com	99	\N	\N	\N	\N	$2y$10$h8wkv0Xxq7ffuKDP/1tTheLGP.XiSucBj6P./5QNZJ0R/rjyb///W	\N	2019-12-04 17:22:56	2019-12-04 17:22:56
13	henry	pinto	\N	henry@gmail.com	215444646	\N	\N	\N	\N	$2y$10$B8rxzhxHDRtDiBjaO53d0.MBHvrz.rmstDvcCiB7YOOrhZAyYadPW	\N	2019-12-04 17:26:33	2019-12-04 17:26:33
\.


--
-- TOC entry 2353 (class 0 OID 0)
-- Dependencies: 183
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 13, true);


--
-- TOC entry 2293 (class 0 OID 34334)
-- Dependencies: 189
-- Data for Name: writers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.writers (id, name, lastname, email, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2354 (class 0 OID 0)
-- Dependencies: 188
-- Name: writers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.writers_id_seq', 1, false);


--
-- TOC entry 2128 (class 2606 OID 34368)
-- Name: areas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areas
    ADD CONSTRAINT areas_pkey PRIMARY KEY (id);


--
-- TOC entry 2150 (class 2606 OID 34498)
-- Name: article_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.article_images
    ADD CONSTRAINT article_images_pkey PRIMARY KEY (id);


--
-- TOC entry 2148 (class 2606 OID 34482)
-- Name: articles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_pkey PRIMARY KEY (id);


--
-- TOC entry 2154 (class 2606 OID 34530)
-- Name: bulletins_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bulletins
    ADD CONSTRAINT bulletins_pkey PRIMARY KEY (id);


--
-- TOC entry 2146 (class 2606 OID 34466)
-- Name: images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.images
    ADD CONSTRAINT images_pkey PRIMARY KEY (id);


--
-- TOC entry 2144 (class 2606 OID 34445)
-- Name: letters_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.letters
    ADD CONSTRAINT letters_pkey PRIMARY KEY (id);


--
-- TOC entry 2109 (class 2606 OID 32313)
-- Name: migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2157 (class 2606 OID 34545)
-- Name: notifications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notifications
    ADD CONSTRAINT notifications_pkey PRIMARY KEY (id);


--
-- TOC entry 2134 (class 2606 OID 34388)
-- Name: permissions_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_name_unique UNIQUE (name);


--
-- TOC entry 2136 (class 2606 OID 34386)
-- Name: permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- TOC entry 2124 (class 2606 OID 34357)
-- Name: redactors_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.redactors
    ADD CONSTRAINT redactors_email_unique UNIQUE (email);


--
-- TOC entry 2126 (class 2606 OID 34355)
-- Name: redactors_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.redactors
    ADD CONSTRAINT redactors_pkey PRIMARY KEY (id);


--
-- TOC entry 2142 (class 2606 OID 34433)
-- Name: role_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_pkey PRIMARY KEY (permission_id, role_id);


--
-- TOC entry 2130 (class 2606 OID 34378)
-- Name: roles_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_unique UNIQUE (name);


--
-- TOC entry 2132 (class 2606 OID 34376)
-- Name: roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- TOC entry 2116 (class 2606 OID 34331)
-- Name: suscriptors_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.suscriptors
    ADD CONSTRAINT suscriptors_email_unique UNIQUE (email);


--
-- TOC entry 2118 (class 2606 OID 34329)
-- Name: suscriptors_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.suscriptors
    ADD CONSTRAINT suscriptors_pkey PRIMARY KEY (id);


--
-- TOC entry 2152 (class 2606 OID 34514)
-- Name: templates_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.templates
    ADD CONSTRAINT templates_pkey PRIMARY KEY (id);


--
-- TOC entry 2138 (class 2606 OID 34403)
-- Name: user_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_has_permissions
    ADD CONSTRAINT user_has_permissions_pkey PRIMARY KEY (user_id, permission_id);


--
-- TOC entry 2140 (class 2606 OID 34418)
-- Name: user_has_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_has_roles
    ADD CONSTRAINT user_has_roles_pkey PRIMARY KEY (role_id, user_id);


--
-- TOC entry 2111 (class 2606 OID 34311)
-- Name: users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2113 (class 2606 OID 34309)
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2120 (class 2606 OID 34344)
-- Name: writers_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.writers
    ADD CONSTRAINT writers_email_unique UNIQUE (email);


--
-- TOC entry 2122 (class 2606 OID 34342)
-- Name: writers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.writers
    ADD CONSTRAINT writers_pkey PRIMARY KEY (id);


--
-- TOC entry 2155 (class 1259 OID 34543)
-- Name: notifications_notifiable_id_notifiable_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX notifications_notifiable_id_notifiable_type_index ON public.notifications USING btree (notifiable_id, notifiable_type);


--
-- TOC entry 2114 (class 1259 OID 34318)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- TOC entry 2168 (class 2606 OID 34499)
-- Name: article_images_article_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.article_images
    ADD CONSTRAINT article_images_article_id_foreign FOREIGN KEY (article_id) REFERENCES public.articles(id) ON DELETE CASCADE;


--
-- TOC entry 2167 (class 2606 OID 34483)
-- Name: articles_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 2170 (class 2606 OID 34531)
-- Name: bulletins_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bulletins
    ADD CONSTRAINT bulletins_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 2166 (class 2606 OID 34467)
-- Name: images_letter_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.images
    ADD CONSTRAINT images_letter_id_foreign FOREIGN KEY (letter_id) REFERENCES public.letters(id) ON DELETE CASCADE;


--
-- TOC entry 2165 (class 2606 OID 34451)
-- Name: letters_area_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.letters
    ADD CONSTRAINT letters_area_id_foreign FOREIGN KEY (area_id) REFERENCES public.areas(id) ON DELETE CASCADE;


--
-- TOC entry 2164 (class 2606 OID 34446)
-- Name: letters_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.letters
    ADD CONSTRAINT letters_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 2162 (class 2606 OID 34422)
-- Name: role_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- TOC entry 2163 (class 2606 OID 34427)
-- Name: role_has_permissions_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


--
-- TOC entry 2169 (class 2606 OID 34515)
-- Name: templates_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.templates
    ADD CONSTRAINT templates_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 2159 (class 2606 OID 34397)
-- Name: user_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_has_permissions
    ADD CONSTRAINT user_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- TOC entry 2158 (class 2606 OID 34392)
-- Name: user_has_permissions_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_has_permissions
    ADD CONSTRAINT user_has_permissions_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 2160 (class 2606 OID 34407)
-- Name: user_has_roles_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_has_roles
    ADD CONSTRAINT user_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


--
-- TOC entry 2161 (class 2606 OID 34412)
-- Name: user_has_roles_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_has_roles
    ADD CONSTRAINT user_has_roles_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 2325 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2019-12-04 14:08:18

--
-- PostgreSQL database dump complete
--

