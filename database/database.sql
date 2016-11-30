/* CREATE TABLES */

CREATE TABLE user  (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR not NULL UNIQUE,
	name VARCHAR not NULL,
	password VARCHAR not NULL,
	email VARCHAR not NULL,
	date_created DATE not NULL
);

CREATE TABLE owner  (
	id INTEGER PRIMARY KEY REFERENCES user
);

CREATE TABLE reviewer  (
	id INTEGER PRIMARY KEY REFERENCES user
);

CREATE TABLE restaurant  (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	owner_id INTEGER REFERENCES owner,
	name VARCHAR not NULL,
	local VARCHAR not NULL,
	description VARCHAR,
	opening_hours TIME,
	closing_hours TIME
);

CREATE TABLE review  (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	reviewer_id INTEGER REFERENCES reviewer,
	restaurant_id INTEGER REFERENCES restaurant,
	points INTEGER not NULL,
	comment VARCHAR
);

CREATE TABLE comment  (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	owner_id INTEGER REFERENCES owner,
	review_id INTEGER REFERENCES review,
	comment VARCHAR
);

/* INSERTS */

INSERT INTO user(username, name, password, email, date_created) VALUES('Admin', 'AdminName','AdminPassword', 'AdminEmail', 'TODAY');
INSERT INTO user(username, name, password, email, date_created) VALUES('Taaa','TaaaName','nogoodpass','aMail','TODAY');
INSERT INTO user(username, name, password, email, date_created) VALUES('Xaaa','Xaaaaaaa','nogoodpass2','a2ndMail','TODAY');

INSERT INTO owner(id) VALUES(1);
INSERT INTO reviewer(id) VALUES(2);
INSERT INTO reviewer(id) VALUES(3);

INSERT INTO restaurant(owner_id,name,local,description,opening_hours,closing_hours) VALUES(1,'Pidgey na Brasa','Pallet Town','Um belo sitio, onde pode comer todo o tipo de Pidgey a um otimo preço.','19:00','00:00');
INSERT INTO restaurant(owner_id,name,local,description,opening_hours,closing_hours) VALUES(1,'Krusty Krabby','Celadon City','O melhor Krabby do Mercado!!!','10:00','22:00');
INSERT INTO restaurant(owner_id,name,local,description,opening_hours,closing_hours) VALUES(1,'McGolduck''s','Safari Zone','Não é McDonald''s','12:00','01:00');

INSERT INTO review(reviewer_id,restaurant_id,points) VALUES(2,1,5);
INSERT INTO review(reviewer_id,restaurant_id,points) VALUES(3,1,10);
