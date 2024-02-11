create table administrator
	(username varchar(100),
	 password varchar(100) not null,
	 primary key(username));

create table customer
	(username varchar(100),
	 password varchar(100) not null,
	 first_name varchar(100),
	 last_name varchar(100),
	 address varchar(300),
	 city varchar(50),
	 state varchar(50),
	 zip varchar(20),
	 card_type varchar(50),
	 card_number varchar(50),
	 card_expiration varchar(50),
	 primary key(username));

create table category
	(category_Id integer,
	 name varchar(100) not null,
 	 primary key(category_Id));

create table book
	(title varchar(200) not null,
	 author varchar(100),
 	 publisher varchar(100),
 	 price float(2) check (price > 0),
	 isbn numeric(13,0),
	 category_Id integer,
	 primary key (isbn),
	 foreign key (category_Id) references category(category_Id));

create table review
	(review_num integer,
	 comment varchar(500),
	 ISBN numeric(13,0),
	 primary key(review_num, ISBN),
	 foreign key(isbn) references book(ISBN));

create table make_order
	(order_num int AUTO_INCREMENT,
	 order_date date,
	 order_time time,
	 username varchar(100),
	 primary key(order_num),
	 foreign key (username) references customer(username));


create table purchasing
	(ISBN numeric(13,0),
	 order_num integer,
	 quantity integer,
	 primary key(ISBN, order_num),
	 foreign key(ISBN) references book(ISBN),
	 foreign key(order_num) references make_order(order_num));