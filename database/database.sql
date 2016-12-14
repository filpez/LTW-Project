/* CREATE TABLES */

CREATE TABLE user  (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR not NULL UNIQUE,
	name VARCHAR not NULL,
	password VARCHAR not NULL,
	email VARCHAR not NULL UNIQUE,
	date_created DATE not NULL
);


CREATE TABLE restaurant  (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	owner_id INTEGER REFERENCES user,
	name VARCHAR not NULL,
	local VARCHAR not NULL,
	description VARCHAR,
	opening_hours TIME,
	closing_hours TIME
);

CREATE TABLE restaurant_image (
	restaurant_id INTEGER REFERENCES restaurant,
	img_path VARCHAR
);

CREATE TABLE review  (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	reviewer_id INTEGER REFERENCES user,
	restaurant_id INTEGER REFERENCES restaurant,
	points INTEGER not NULL,
	comment VARCHAR
);

CREATE TABLE comment  (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	owner_id INTEGER REFERENCES user,
	review_id INTEGER REFERENCES user,
	comment VARCHAR
);

/* INSERTS */

INSERT INTO user(username, name, password, email, date_created) VALUES('Admin1', 'AdminName','d882b8721a224d38ebb54559e6b54e5df3a1bc6d', 'admin@admin.adm', '2016-12-09 09:09:40'); /*pass=AdminPassword*/
INSERT INTO user(username, name, password, email, date_created) VALUES('user01','foo','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','taa@mail.com', '2016-12-09 09:17:01'); /*password*/

INSERT INTO owner(id) VALUES(1);
INSERT INTO reviewer(id) VALUES(2);
INSERT INTO reviewer(id) VALUES(3);

INSERT INTO restaurant(owner_id,name,local,description,opening_hours,closing_hours) VALUES(1,'Pidgey na Brasa','Pallet Town','Um belo sitio, onde pode comer todo o tipo de Pidgey a um otimo preco.','19:00','00:00');
INSERT INTO restaurant(owner_id,name,local,description,opening_hours,closing_hours) VALUES(1,'Krusty Krabby','Celadon City','O melhor Krabby do Mercado!!!','10:00','22:00');
INSERT INTO restaurant(owner_id,name,local,description,opening_hours,closing_hours) VALUES(1,'McGolduck''s','Safari Zone','Nao e McDonald''s','12:00','01:00');

INSERT INTO review(reviewer_id,restaurant_id,points) VALUES(2,1,5);
INSERT INTO review(reviewer_id,restaurant_id,points) VALUES(3,1,10);

INSERT INTO restaurant_image (restaurant_id, img_path) VALUES(1,'1480673678AAAAAAAA.jpg');

