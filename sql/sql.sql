CREATE database tareas;

CREATE TABLE agenda
(
	id int NOT NULL,
	tarea varchar(700) character set utf8 collate utf8_spanish_ci,
	materia varchar(150) character set utf8 collate utf8_spanish_ci,
 	PRIMARY KEY (id)
)engine=myisam character set utf8 collate utf8_spanish_ci;