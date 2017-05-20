create table topics(PKtopicID int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
topicName varchar(20),
usrComment varchar(300),
dateCreated TIMESTAMP,
FKuserID int(10),
FKcatID int(10)); 


////////////////////////////////////////////




create table topics(topic_id int(255) unsigned auto_increment primary key,
topic_name varchar(255),
topic_user_name varchar(20),
fk_user_id int(20),
fk_cat_id int(20),
topic_date date);





create table posts(post_id int(255) unsigned auto_ increment primary key,
post_content text,
post_topic int(20),
post_fk_cat int(8),
post_date datetime,
post_userName int(20));

