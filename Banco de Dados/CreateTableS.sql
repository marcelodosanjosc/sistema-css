create table agente(
	id int auto_increment not null primary key,
    cpf varchar(50) not null,
    nome varchar(50) not null,
    login varchar(50) not null,
    senha varchar(50) not null,
	email varchar(100) not null    
);

create table administrador(
	id int auto_increment not null primary key,
    nome varchar(50) not null,
    login varchar(50) not null,
    senha varchar(50) not null

);

CREATE TABLE bairro(
	id int auto_increment not null primary key,
    nomeBairro varchar(100) not null
);

CREATE TABLE rua(
	id int auto_increment not null primary key,
    nome varchar(100) not null,
    id_bairro int not null,
    
    foreign key(id_bairro) references bairro(id) on delete cascade
);

CREATE TABLE situacao(
	id int auto_increment not null primary key,
    tipo varchar(50) not null

);

create table publicacaoagente(
	id int auto_increment not null primary key,
    publicacao varchar(100) not null,
    nivel int not null,
    datahora datetime,
    id_situacao int not null,
    id_bairro int not null,
    id_agente int not null,
    id_rua int not null,
    
    foreign key(id_situacao) references situacao(id) on delete cascade,
	foreign key(id_bairro) references bairro(id) on delete cascade,
    foreign key(id_agente) references agente(id) on delete cascade,
    foreign key(id_rua) references rua(id) on delete cascade
    
);