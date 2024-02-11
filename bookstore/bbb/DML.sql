insert into administrator(username, password) values('admin', 11111);
insert into administrator(username, password) values('test', 12345);
insert into administrator(username, password) values('root', 66666);

insert into customer values ('gretchen', 12345, 'Gretchen', 'Raven', '303 S Main St.', 'Ann Arbor', 'Michigan',48105,'VISA',1234567891012345,0425);
insert into customer values ('zara', 11111, 'Zara', 'West', '419 Detroit St.', 'Detroit', 'Michigan',48176,'MASTER',1293840516403928,0327);
insert into customer values ('Anna', 23456, 'Anna', 'Hope', '419 Detroit St.', 'HoleSte', 'Michigan',48111,'DISCOVER',1293840516403438,0223);

insert into category(category_Id, name) values (1,'Fantasy');
insert into category(category_Id, name) values (2,'Adventure');
insert into category(category_Id, name) values (3,'Fiction');
insert into category(category_Id, name) values (4,'Horror');
insert into category(category_Id, name) values (5, 'Non-fiction');

insert into book(title, author, publisher, price, isbn, category_Id) values ('Database Design for Mere Mortals: 25th Anniversary Edition','Michael J. Hernandez', 'Addison-Wesley Professional', 23.99,9780136788041, 3);
insert into book(title, author, publisher, price, isbn, category_Id) values ('The Simplified Beginner Guide to Managing With SQL','Walter Shields', 'ClydeBank Media LLC', 22.49, 9781945051753,2);
insert into book(title, author, publisher, price, isbn, category_Id) values ('Database System Concepts','Henry F. Korth', 'McGraw Hill', 37.66,9780073523323, 1);
insert into book(title, author, publisher, price, isbn, category_Id) values ('The Girl Who Drank the Moon','Kelly Barnhill', 'Algonquin Young Readers', 10.66,9781616205676, 1);
insert into book(title, author, publisher, price, isbn, category_Id) values ('Vigils Valor: A LitRPG Adventure','James Hunter', 'Independently published', 18.99,9798362896805, 2);
insert into book(title, author, publisher, price, isbn, category_Id) values ('Girl Left Behind','C.J. Cross', 'Liquid Mind Media', 12.93, 9781685330071,3);
insert into book(title, author, publisher, price, isbn, category_Id) values ('Do not Look Back','Wade Walker', 'B0BHQKJGRN', 12.93, 9798987108413,4);


insert into review(review_num,comment,ISBN) values(1,'This book was a life saver. I’m so glad I purchased it. Well done!',9780136788041);
insert into review(review_num,comment,ISBN) values(2,'Ordered this item for school, a little bit hard to access but I am able to access the material fine.',9780136788041);
insert into review(review_num,comment,ISBN) values(3,'Good book',9780136788041);
insert into review(review_num,comment,ISBN) values(1,'This is a fantastic book for those interested in learning SQL.',9781945051753);
insert into review(review_num,comment,ISBN) values(2,'This is one of the best books of all times among those I have read.',9781945051753);
insert into review(review_num,comment,ISBN) values(3,'On the positive side, there are good, simple, easy to follow examples',9781945051753);
insert into review(review_num,comment,ISBN) values(1,'This book is great. I am taking a database class for College now and this book is the reason I am doing so well!',9780073523323);
insert into review(review_num,comment,ISBN) values(2,'One of the best books around for Database/SQL learning.',9780073523323);
insert into review(review_num,comment,ISBN) values(3,'Great, good quality low price!',9780073523323);
insert into review(review_num,comment,ISBN) values(1,'Excellent story and beautifully written.',9781616205676);
insert into review(review_num,comment,ISBN) values(2,'Loved this book!',9781616205676);
insert into review(review_num,comment,ISBN) values(3,'Slow and repetitive in parts but overall good and would recommend.',9781616205676);
insert into review(review_num,comment,ISBN) values(1,'Great character development and the dialogue is hilarious. I will never think of pixies the same way lol. Can not wait for the next book.',9798362896805);
insert into review(review_num,comment,ISBN) values(2,'This may be my favourite series outside his massive VGO series.',9798362896805);
insert into review(review_num,comment,ISBN) values(3,'Thoroughly enjoyable romp with plenty of magic and cat attacks.',9798362896805);

insert into review(review_num,comment,ISBN) values(1,'Predictable but enjoyable.',9781685330071);
insert into review(review_num,comment,ISBN) values(2,'It was a good read - no real surprises but a nice story',9781685330071);
insert into review(review_num,comment,ISBN) values(3,'Stunningly beautiful writing. This is my first book by this author and I am looking forward to reading more. Highly recommend.',9781685330071);

insert into review(review_num,comment,ISBN) values(1,'This book kept me entertained. ',9798987108413);
insert into review(review_num,comment,ISBN) values(2,'Such a great read! I have recommended this book to several of my fellow readers. ',9798987108413);
insert into review(review_num,comment,ISBN) values(3,'Intense, really enthralling read!',9798987108413);


insert into make_order(order_num, order_date, order_time,username) values(1, '2022-07-04','07:22:01','gretchen');
insert into make_order(order_num, order_date, order_time,username) values(2, '2023-01-04','08:25:23','zara');
insert into make_order(order_num, order_date, order_time,username) values(3, '2021-12-12','09:30:25','Anna');

insert into make_order(order_num, order_date, order_time,username) values(4, '2023-01-04','07:22:01','gretchen');
insert into make_order(order_num, order_date, order_time,username) values(5, '2023-01-08','08:25:23','zara');
insert into make_order(order_num, order_date, order_time,username) values(6, '2023-02-12','09:30:25','Anna');

insert into make_order(order_num, order_date, order_time,username) values(7, '2023-03-04','07:22:01','gretchen');
insert into make_order(order_num, order_date, order_time,username) values(8, '2023-03-08','08:25:23','zara');
insert into make_order(order_num, order_date, order_time,username) values(9, '2023-04-12','09:30:25','Anna');

insert into purchasing(ISBN, order_num, quantity) values(9780136788041,1,1);
insert into purchasing(ISBN, order_num, quantity) values(9780073523323,2,1);
insert into purchasing(ISBN, order_num, quantity) values(9781685330071,3,2);

insert into purchasing(ISBN, order_num, quantity) values(9780136788041,4,2);
insert into purchasing(ISBN, order_num, quantity) values(9780073523323,4,1);
insert into purchasing(ISBN, order_num, quantity) values(9781685330071,5,2);

insert into purchasing(ISBN, order_num, quantity) values(9781945051753,6,1);
insert into purchasing(ISBN, order_num, quantity) values(9798362896805,7,1);
insert into purchasing(ISBN, order_num, quantity) values(9781685330071,8,2);

insert into purchasing(ISBN, order_num, quantity) values(9798362896805,8,1);
insert into purchasing(ISBN, order_num, quantity) values(9780073523323,9,1);

