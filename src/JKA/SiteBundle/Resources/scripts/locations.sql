use jka_v2;

delete from location;
delete from country;

insert into country(id,name) values(1,"Argentina");
insert into country(id,name) values(2,"Uruguay");
insert into country(id,name) values(3,"Paraguay");
insert into country(id,name) values(4,"Chile");
insert into country(id,name) values(5,"Brasil");

/*Argentina*/
insert into location(name,country_id) values("Capital Federal",1);
insert into location(name,country_id) values("Buenos Aires",1);
insert into location(name,country_id) values("Catamarca",1);
insert into location(name,country_id) values("Chaco",1);
insert into location(name,country_id) values("Chubut",1);
insert into location(name,country_id) values("Cordoba",1);
insert into location(name,country_id) values("Corrientes",1);
insert into location(name,country_id) values("Entre Rios",1);
insert into location(name,country_id) values("Formosa",1);
insert into location(name,country_id) values("Jujuy",1);
insert into location(name,country_id) values("La Pampa",1);
insert into location(name,country_id) values("La Rioja",1);
insert into location(name,country_id) values("Mendoza",1);
insert into location(name,country_id) values("Misiones",1);
insert into location(name,country_id) values("Neuquen",1);
insert into location(name,country_id) values("Rio Negro",1);
insert into location(name,country_id) values("Salta",1);
insert into location(name,country_id) values("San Juan",1);
insert into location(name,country_id) values("San Luis",1);
insert into location(name,country_id) values("Santa Cruz",1);
insert into location(name,country_id) values("Santa Fe",1);
insert into location(name,country_id) values("Santiago del Estero",1);
insert into location(name,country_id) values("Tierra del Fuego",1);
insert into location(name,country_id) values("Tucuman",1);

/*Uruguay*/
insert into location(name,country_id) values("Artigas",2);
insert into location(name,country_id) values("Canelones",2);
insert into location(name,country_id) values("Cerro Largo",2);
insert into location(name,country_id) values("Colonia",2);
insert into location(name,country_id) values("Durazno",2);
insert into location(name,country_id) values("Flores",2);
insert into location(name,country_id) values("Florida",2);
insert into location(name,country_id) values("Lavalleja",2);
insert into location(name,country_id) values("Maldonado",2);
insert into location(name,country_id) values("Montevideo",2);
insert into location(name,country_id) values("Paysandu",2);
insert into location(name,country_id) values("Rio Negro",2);
insert into location(name,country_id) values("Rivera",2);
insert into location(name,country_id) values("Rocha",2);
insert into location(name,country_id) values("Salto",2);
insert into location(name,country_id) values("San Jose",2);
insert into location(name,country_id) values("Soriano Mercedes",2);
insert into location(name,country_id) values("Tacuarembo",2);
insert into location(name,country_id) values("Treinta y Tres",2);

/*Paraguay*/
insert into location(name,country_id) values("Asuncion",3);
insert into location(name,country_id) values("Concepcion",3);
insert into location(name,country_id) values("San Pedro",3);
insert into location(name,country_id) values("Cordillera",3);
insert into location(name,country_id) values("Guaira",3);
insert into location(name,country_id) values("Caaguazu",3);
insert into location(name,country_id) values("Caazapa",3);
insert into location(name,country_id) values("Itapua",3);
insert into location(name,country_id) values("Misiones",3);
insert into location(name,country_id) values("Paraguari",3);
insert into location(name,country_id) values("Alto Parana",3);
insert into location(name,country_id) values("Central",3);
insert into location(name,country_id) values("Ñeembucu",3);
insert into location(name,country_id) values("Amambay",3);
insert into location(name,country_id) values("Canindeyu",3);
insert into location(name,country_id) values("Presidente Hayes",3);
insert into location(name,country_id) values("Alto Paraguay",3);
insert into location(name,country_id) values("Boqueron",3);


/*Chile*/
insert into location(name,country_id) values("Arica y Parinacota",4);
insert into location(name,country_id) values("Tarapaca",4);
insert into location(name,country_id) values("Antofagasta",4);
insert into location(name,country_id) values("Atacama",4);
insert into location(name,country_id) values("Coquimbo",4);
insert into location(name,country_id) values("Valparaiso",4);
insert into location(name,country_id) values("Metropolitana de Santiago",4);
insert into location(name,country_id) values("Libertador General Bernardo O'Higgins",4);
insert into location(name,country_id) values("Maule",4);
insert into location(name,country_id) values("Bio Bio",4);
insert into location(name,country_id) values("La Araucania",4);
insert into location(name,country_id) values("Los Rios",4);
insert into location(name,country_id) values("Los Lagos",4);
insert into location(name,country_id) values("Aysen del General Carlos Ibañez del Campo",4);
insert into location(name,country_id) values("Magallanes y la Antartica Chilena",4);

/*Brasil*/
insert into location(name,country_id) values("Acre",5);
insert into location(name,country_id) values("Alagoas",5);
insert into location(name,country_id) values("Amapa",5);
insert into location(name,country_id) values("Amazonas",5);
insert into location(name,country_id) values("Bahia",5);
insert into location(name,country_id) values("Ceara",5);
insert into location(name,country_id) values("Distrito Federal",5);
insert into location(name,country_id) values("Espirito Santo",5);
insert into location(name,country_id) values("Goias",5);
insert into location(name,country_id) values("Maranhao",5);
insert into location(name,country_id) values("Mato Grosso",5);
insert into location(name,country_id) values("Mato Grosso do Sul",5);
insert into location(name,country_id) values("Minas Gerais",5);
insert into location(name,country_id) values("Para",5);
insert into location(name,country_id) values("Paraiba",5);
insert into location(name,country_id) values("Parana",5);
insert into location(name,country_id) values("Pernambuco",5);
insert into location(name,country_id) values("Piaui",5);
insert into location(name,country_id) values("Rio de Janeiro",5);
insert into location(name,country_id) values("Rio Grande do Norte",5);
insert into location(name,country_id) values("Rio Grande do Sul",5);
insert into location(name,country_id) values("Rondonia",5);
insert into location(name,country_id) values("Roraima",5);
insert into location(name,country_id) values("Santa Catarina",5);
insert into location(name,country_id) values("Sao Paulo",5);
insert into location(name,country_id) values("Sergipe",5);
insert into location(name,country_id) values("Tocantins",5);