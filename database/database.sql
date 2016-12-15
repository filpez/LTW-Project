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
	points INTEGER NOT NULL,
	comment VARCHAR
);

CREATE TABLE comment  (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	review_id INTEGER REFERENCES review,
	reviewer_id INTEGER REFERENCES user,
	comment VARCHAR NOT NULL
);

/* INSERTS */

INSERT INTO user(username, name, password, email, date_created) VALUES('Admin1', 'AdminLOL','d882b8721a224d38ebb54559e6b54e5df3a1bc6d', 'admin@admin.adm', '2016-12-09 09:09:40'); /*pass=AdminPassword*/
INSERT INTO user(username, name, password, email, date_created) VALUES('user01', 'foo', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'taa@mail.com', '2016-12-09 09:17:01'); /*pass=password*/
INSERT INTO user(username, name, password, email, date_created) VALUES('user02', 'DJ', '789b49606c321c8cf228d17942608eff0ccc4171', 'user02@yap.uk', '2016-12-14 00:06:21'); /*pass=pass1234*/

INSERT INTO restaurant(owner_id,name,local,description,opening_hours,closing_hours) VALUES(1,'Grilled Pidgey','Pallet Town','A nice place to eat every kind of Pidgey for a great price.','19:00','00:00');
INSERT INTO restaurant(owner_id,name,local,description,opening_hours,closing_hours) VALUES(1,'Krusty Krabby','Celadon City','Best Krabby in the market!!!','10:00','22:00');
INSERT INTO restaurant(owner_id,name,local,description,opening_hours,closing_hours) VALUES(2,'McGolduck''s','Safari Zone','Not McDonald''s','7:45','01:00');
INSERT INTO restaurant(owner_id,name,local,description) VALUE(2, 'Ludicolo''s Tacos', 'Mexico, Mexico', 'BEST. TACOS. EVER');

INSERT INTO restaurant_image(restaurant_id, img_path) VALUES(1, '1481819762.jpg');
INSERT INTO restaurant_image(restaurant_id, img_path) VALUES(1, '1481819769.jpg');

INSERT INTO review(reviewer_id,restaurant_id,points) VALUES(2,1,5);
INSERT INTO review(reviewer_id,restaurant_id,points) VALUES(3,1,10);


