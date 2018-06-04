create database esmalteria_estrela;
use esmalteria_estrela;

create table customers(
	id int not null primary key auto_increment,
    name  varchar(45) not null,
    lastname varchar(45) not null, 
	phone varchar(15) not null,
	bith date not null,
	password varchar(32) not null,
    email  varchar(45) not null,
	cep varchar (8) not null,
    rua varchar(45) not null,
    bairro varchar(45) not null,
    cidade varchar(45) not null,
    uf varchar(2) not null
);