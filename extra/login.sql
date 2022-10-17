create database  login;

use database login

create table  Contas(
    id int not null primary key auto_increment,
    nome varchar(140) not null,
    usuario varchar(140) not null,
    senha varchar(16) not null
);

insert into Contas values (0, 'Wesley', 'wes', 'wes123');