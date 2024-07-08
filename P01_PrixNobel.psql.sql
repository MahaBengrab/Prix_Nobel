------------------------------------Création table Lauréat---------------------------------------
CREATE TABLE IF NOT EXISTS Laureat (
laureat_id SERIAL ,
laureat_nom VARCHAR(50) NOT NULL,
laureat_date_naissance DATE NOT NULL,
laureat_sexe VARCHAR(50) NOT NULL CHECK(laureat_sexe IN('Homme','Femme')),
laureat_nationalite VARCHAR(50) NOT NULL,
PRIMARY KEY (laureat_id));

--------------------------------------Création table Prix---------------------------------------
CREATE TABLE IF NOT EXISTS Prix(
prix_id SERIAL,
prix_discipline VARCHAR(50) NOT NULL,
prix_montant NUMERIC(12,2),
prix_comite VARCHAR(200) CHECK (prix_comite IN ('Academie royale des sciences de Suede','Academie suedoise','Comite Nobel norvegien','Institut Karolinska')),
PRIMARY KEY (prix_id));

--------------------------------------Création table Gagne---------------------------------------
CREATE TABLE IF NOT EXISTS Gagne(
laureat_id INT NOT NULL,
prix_id INT NOT NULL,
prix_annee INTEGER NOT NULL,
PRIMARY KEY (laureat_id , prix_id),
FOREIGN KEY (laureat_id) REFERENCES Laureat(laureat_id) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (prix_id) REFERENCES Prix(prix_id) ON UPDATE CASCADE ON DELETE CASCADE);

-------------------------------------Insertion des Laureats--------------------------------------
INSERT INTO Laureat(laureat_nom, laureat_date_naissance, laureat_sexe, laureat_nationalite)VALUES
 -----------------------------------------Physique-----------------------------------------------
('Ernaux Annie', '1940-09-01', 'Femme', 'Française'),
('Arrhenius Svante August', '1859-02-19', 'Homme', 'Suédoise'),
('Rontgen Wilhelm', '1845-03-27', 'Homme', 'Allemande'),
('Fosse Jon', '1959-09-29', 'Homme', 'Norvègienne'),
('Hendrik Lorentz','1853-07-18','Homme','Néerlandaise'),
('Pierre Curie','1859-05-15','Homme','Française'),
('Marie Curie','1867-11-07','Femme','Française'),
('Lord Rayleigh','1842-11-12','Homme','Royaume-Uni'),
('Henri Becquerel','1852-12-15','Homme','Française'),
('Philipp Lenard','1862-06-07','Homme','Royaume de Hongrie'),
('Joseph John Thomson','1856-12-18','Homme','Royaume-Uni'),
('Albert A. Michelson','1852-12-19','Homme','Américaine'),
('Gabriel Lippmann','1845-08-16','Homme','Franco-Luxembourgeois'),
('Ferdinand Braun','1850-06-06','Homme','Électorat de Hesse'),
('Guglielmo Marconi','1874-04-25','Homme','Italienne'),
('Johannes Diderik van der Waals','1837-11-23','Homme','Néerlandaise'),
('Wilhelm Wien','1864-01-13','Homme','Allemande'),
('Emil Fischer','1852-10-09','Homme','Allemande'),
('Svante August Arrhenius','1859-02-19','Homme','Suédoise'),
('William Ramsay','1852-10-02','Homme','Britannique'),
('Adolf von Baeyer','1835-10-31','Homme','Allemande'),
('Ferdinand Frédéric Henri Moissan','1852-09-28','Homme','Française'),
 ('Heike Kamerlingh Onnes', '1853-09-21', 'Homme','Néerlandaise'), 
('Max von Laue', '1879-10-09', 'Homme', 'Allemande'), 
('William Henry Bragg', '1862-07-02', 'Homme', 'Britannique'), 
('William Lawrence Bragg', '1890-03-31', 'Homme', 'Britannique australienne'), 
('Charles Glover Barkla', '1877-06-07', 'Homme', 'Britannique'), 
('Max Planck', '1858-04-23', 'Homme', 'Allemande'),
('Johannes Stark', '1874-04-15', 'Homme', 'Allemande'),
('Pieter Zeeman', '1865-05-25', 'Homme', 'Néerlandaise'), 
('Edward Victor Appleton','1892-09-06','Homme','Britannique'),
 -----------------------------------------Chimie-------------------------------------------------
('Emil Fischer', '1852-10-09', 'Homme', 'Allemande'),
('William Ramsay', '1852-10-02', 'Homme', 'Britannique'),
('Adolf von Baeyer', '1835-10-31', 'Homme', 'Allemande'), 
('Ferdinand Frédéric Henri Moissan', '1852-09-28', 'Homme', 'Française'),
('Eduard Buchner', '1860-05-20', 'Homme', 'Royaume de Bavière'), 
('Ernest Rutherford', '	1871-08-30', 'Homme', 'Néo-Zélandaise'), 
('Friedrich Wilhelm Ostwald', '1853-09-02', 'Homme', 'Allemande'),
('Jennifer Doudna', '1964-02-19', 'Femme', 'Américaine'), 
('Emmanuelle Charpentier', '1968-12-11', 'Femme', 'Française'), 
('Frances Hamilton Arnold', '1956-07-25', 'Femme', 'Américaine'), 
  ---------------------------------------Medecine------------------------------------------------
('Emil Adolf von Behring', '1854-03-15', 'Homme', 'Prussienne allemande'), 
('Barbara McClintock', '1902-06-16', 'Femme', 'Américaine'), 
('Arvid Carlsson', '1923-01-25', 'Homme', 'Suèdoise'), 
('Harvey James Alter', '1935-09-12', 'Homme', 'Américaine'), 
('Katalin Karikó', '1955-01-17', 'Femme', 'Américaine'), 
('Frederick Gowland Hopkins', '1861-06-20', 'Homme', 'Britannique'),
('Robert Koch', '1843-12-11', 'Homme', 'Allemande'), 
('Camillo Golgi', '1843-07-12', 'Homme', 'Italienne'), 
('Santiago Ramón y Cajal', '1852-05-01', 'Homme', 'Espagnole'),
('Emil Theodor Kocher', '1841-08-25', 'Homme', 'Suisse'),
('August Krogh', '1874-11-15', 'Homme', 'Danoise'), 
  ---------------------------------------Litterature---------------------------------------------
('René Armand François Prudhomme', '1839-03-16', 'Homme', 'Française'), 
('Theodor Mommsen', '1817-10-30', 'Homme', 'Prussienne'), 
('Frédéric Mistral', '1830-09-08', 'Homme', 'Française'), 
('Annie Ernaux', '1940-09-01', 'Femme', 'Française'),
('Abdulrazak Gurnah', '1948-12-20', 'Homme', 'Britannique'),
('Herta Müller', '1953-08-17', 'Femme', 'Gérmano-roumaine'), 
('Svetlana Aleksandrovna Alexievitch', '1948-05-31', 'Femme', 'Biélorusse'),
('Wisława Szymborska', '1923-07-02', 'Femme', 'Polognaise'), 
('Najib Mahfouz', '1911-12-11', 'Homme', 'Egyptienne'), 
('Nadine Gordimer', '1923-10-20', 'Femme', 'Sud-africaine'), 
('Gabriela Mistral', '1889-04-07', 'Femme', 'Chilienne'),
('Carl Spitteler', '1845-04-24', 'Homme', 'Suisse'),
('Romain Rolland', '1866-01-29', 'Homme', 'Française'),
('Rudyard Kipling', '1865-12-30', 'Homme', 'Britannique'),
('André Gide', '1869-11-22', 'Homme', 'Française'),
('Georges Séféris', '1900-03-12', 'Homme', 'Grecque'),
('Eugenio Montale', '1896-10-12', 'Homme', 'Italienne'),
('Henri Bergson', '1859-10-18', 'Homme', 'Française'),
  ------------------------------------------Paix-------------------------------------------------
  ('Henry Dunant', '1828-05-08', 'Homme', 'Franco-Suisse'),
  ('Frédéric Passy', '1822-05-20', 'Homme', 'Française'), 
  ('Élie Ducommun', '1833-02-19', 'Homme', 'Suisse'), 
  ('Albert Gobat', '1843-05-21', 'Homme', 'Suisse'), 
  ('William Randal Cremer', '1828-03-18', 'Homme', 'Britannique'),
  ('Bertha von Suttner', '1843-06-09', 'Femme', 'Autrichienne'), 
  ('John Raleigh Mott', '1865-05-25', 'Homme', 'Américaine'), 
  ('Emily Greene Balch', '1867-01-08', 'Femme', 'Américaine'), 
  ('Linus Carl Pauling', '1901-02-28', 'Homme', 'Américaine'), 
  ('Norman E. Borlaug', '1914-03-25', 'Homme', 'Américaine'), 
  ('Mairead Corrigan', '1944-01-27', 'Femme', 'Britannique'), 
  ('Kim Dae-jung', '1925-12-03', 'Homme', 'Sud-coréenne'), 
  ('Wangari Muta Maathai', '1940-04-01', 'Femme', 'Kényane'),
  ('Rigoberta Menchú', '1959-01-09', 'Femme', 'Guatémaltèque'),
  ('Jody Williams', '1950-10-09', 'Femme', 'Américaine'), 
  ('Shirin Ebadi', '1947-06-21', 'Femme', 'Iranienne'), 
  ('Albert Arnold Gore', '1948-03-31', 'Homme', 'Américaine'), 
  ('Kailash Satyarthi', '1954-01-11', 'Homme', 'Indienne'), 
  ('Narges Mohammadi', '1972-04-21', 'Femme', 'Iranienne'), 
  ('Maria Angelita Ressa', '1963-10-02', 'Femme', 'Américaine philippine'), 
  ('Nadia Murad', '1994-03-10', 'Femme', 'Irakienne'), 
-------------------------------------------Economie----------------------------------------------
  ('Paul Samuelson', '1915-05-15', 'Homme', 'Américaine'), 1970
  ('Claudia Goldin', '1946-05-14', 'Femme', 'Américaine'),
  ('Douglas Warren Diamond', '1953-10-25', 'Homme', 'Américaine'), 
  ('Robert Butler', '1937-05-16', 'Homme', 'Américaine'), 
  ('Angus Stewart Deaton', '1945-10-19', 'Homme', 'Britannico-américaine'), 
  ('Jean Tirole', '1953-08-09', 'Homme', 'Française'), 
  ('Thomas Sargent', '1943-07-19', 'Homme', 'Américaine'),
  ('Abhijit Banerjee', '1961-02-21', 'Homme', 'Américaine'), 
  ('Oliver Hart', '1948-10-09', 'Homme', 'Britannique américaine'), 
  ('Bengt Holmström', '1949-04-18', 'Homme', 'Finlandaise'), 
  ('Robert Mundell', '1932-10-24', 'Homme', 'Canadienne'), 
  ('Ronald Coase', '1910-12-29', 'Homme', 'Britannique'), 
  ('Maurice Allais', '2010-10-09', 'Homme', 'Française'), 
  ('Robert Solow', '1924-08-23', 'Homme', 'Américaine'),
  ('Gérard Debreu', '1921-07-04', 'Homme', 'Française Américaine'), 
  ('James Tobin', '1918-03-05', 'Homme', 'Américaine'), 
  ('Elinor Ostrom', '1933-08-07', 'Femme', 'Américaine'), 
  ('George Akerlof', '1940-06-17', 'Homme', 'Américaine'), 
  ('Leonid Hurwicz', '1917-08-21', 'Homme', 'Américaine'), 
  ('Guido Imbens', '1963-09-03', 'Homme', 'Néerlandaise américaine'), 
  ('Ragnar Anton Kittil Frisch', '1895-03-03', 'Homme', 'Norvègienne'); 




----------------------------------------Insertion des prix---------------------------------------
INSERT INTO Prix(Prix_Discipline, prix_montant,prix_comite)
VALUES('Physique','920948.12 ','Academie royale des sciences de Suede'),
('Chimie', '856720','Academie royale des sciences de Suede'),
('Litterature', '830000', 'Academie suedoise'),
('Paix','710000','Comite Nobel norvegien'),
('Physiologie ou medecine','1000000','Academie royale des sciences de Suede'),('Economie','870000','Academie royale des sciences de Suede');




----------------------------------------Insertion de Gagne---------------------------------------
 INSERT INTO Gagne(prix_id,laureat_id,prix_annee) VALUES
((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Ernaux Annie'),2022), 
 
 
INSERT INTO Gagne(prix_id,laureat_id,prix_annee) VALUES
((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Ernaux Annie'),2022), 
 
((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Arrhenius Svante August'),2021), 
 
 
((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Rontgen Wilhelm'),1900);
        
                   
((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Fosse Jon'),2000), 
 
 
 
((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Hendrik Lorentz'),1900), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Pierre Curie'),1998), 

((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Marie Curie'),1950), 

((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Lord Rayleigh'),1995), 

((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Henri Becquerel'),19502), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Philipp Lenard'),1975), 

((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Joseph John Thomson'),1996), 

((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Albert A. Michelson'),1995), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Gabriel Lippmann'),1978), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Ferdinand Braun'),1992), 

((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Guglielmo Marconi'),1991), 

((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Johannes Diderik van der Waals'),1899), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Wilhelm Wien'),1896), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Emil Fischer'),1930), 

((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Svante August Arrhenius'),1929), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'William Ramsay'),1900), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Adolf von Baeyer'),1923), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Ferdinand Frédéric Henri Moissan'),1898), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Heike Kamerlingh Onnes'),1900), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Max von Laue'),1960), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'William Henry Bragg'),1900), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'William Lawrence Bragg'),1970), 



((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Charles Glover Barkla'),1989), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Max Planck'),1921), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Johannes Stark'),)1922, 



((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Pieter Zeeman'),1924), 



((SELECT prix_id FROM Prix WHERE prix_discipline ='Physique'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Edward Victor Appleton'),1940), 



((SELECT prix_id FROM Prix WHERE prix_discipline ='Chimie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Emil Fischer'),1900, 



((SELECT prix_id FROM Prix WHERE prix_discipline ='Chimie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'William Ramsay'),1990), 



((SELECT prix_id FROM Prix WHERE prix_discipline ='Chimie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Adolf von Baeyer'),1955), 



((SELECT prix_id FROM Prix WHERE prix_discipline ='Chimie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Ferdinand Frédéric Henri Moissan'),1970), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Henry Dunant'),1901), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Frédéric Passy'),1901), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Élie Ducommun'),1902), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Albert Gobat'),1902), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'William Randal Cremer'),1903), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Bertha von Suttner'),1905), 


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'John Raleigh Mott'),1946);


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Emily Greene Balch'),1946);


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Linus Carl Pauling'),1962);


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Norman E. Borlaug'),1970);

((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Emily Greene Balch'),1976);


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Linus Carl Pauling'),2000);


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Norman E. Borlaug'),1970);


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Wangari Muta Maathai'),2004);


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Mairead Corrigan'),1992);

((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Kim Dae-jung'),2000);

((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Wangari Muta Maathai'),2004);

((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Jody Williams'),2002);

((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Shirin Ebadi'),2003;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Albert Arnold Gore'),2007;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Kailash Satyarthi'),2014;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Narges Mohammadi'),2023;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Maria Angelita Ressa'),2021;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Paix'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Nadia Murad'),2018;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Paul Samuelson'),1970;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Claudia Goldin'),2023;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Douglas Warren Diamond'),2022;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Robert Butler'),2020;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Angus Stewart Deaton'),2015;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Jean Tirole'),2014;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Thomas Sargent'),2011;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Abhijit Banerjee'),2019;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Bengt Holmström'),2016;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Robert Mundell'),1999;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Ronald Coase'),1991;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Maurice Allais'),1988;



((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Robert Solow'),1987;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Gérard Debreu'),1983;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'James Tobin'),1981;



((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Elinor Ostrom'),2009;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'George Akerlof'),2001;

((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Leonid Hurwicz'),2007;



((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Guido Imbens'),2021;


((SELECT prix_id FROM Prix WHERE prix_discipline ='Economie'),
(SELECT laureat_id  FROM Laureat WHERE laureat_nom = 'Ragnar Anton Kittil Frisch'),1969);

