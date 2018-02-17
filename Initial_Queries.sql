USE master
CREATE DATABASE Hophacks
GO

USE Hophacks

CREATE TABLE Organizations (
	ID				int IDENTITY(1,1)NOT NULL,
	Name			varchar(30)		 NOT NULL,
	Street			varchar(50)		 NULL,
	City			varchar(50)		 NULL,
	State			char(2)			 NULL,
	Related_Major1	varchar(50)		 NOT NULL,
	Related_Major2	varchar(50)		 NULL,
	Related_Major3	varchar(50)		 NULL,
	Org_Type		varchar(20)		 NOT NULL,

	PRIMARY KEY (ID)
);

INSERT INTO Organizations (Name, Street, City, State, Related_Major1, Org_Type)
VALUES('Hopkins Breakers', 'N Charles st', 'Baltimore', 'MD', 'Basket Weaving', 'Dance');

INSERT INTO Organizations (Name, Street, City, State, Related_Major1, Org_Type)
VALUES('Chinese Students Association', 'N Charles st', 'Baltimore', 'MD', 'Bio', 'Social');

UPDATE Organizations
SET Related_Major2='Bio', Related_Major3='Chem'
WHERE Name='Hopkins Breakers'

DELETE FROM Organizations
WHERE Name='Chinese Students Association'

SELECT * FROM Organizations
WHERE Name='Hopkins Breakers'


