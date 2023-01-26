-- public.sent_email definition

-- Drop table

-- DROP TABLE public.sent_email;

CREATE TABLE public.sent_email (
	email varchar NOT NULL,
	subject varchar NULL,
	body text NULL
);