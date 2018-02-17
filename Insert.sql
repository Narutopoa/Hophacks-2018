/*Find the dates and exchanges where that exchange has more than x trades per minute, while the exchange specific Bitcoin price has been below y.*/
delimiter //
DROP PROCEDURE IF EXISTS InsertOrg//
CREATE PROCEDURE InsertOrg(IN Name varchar(30), Street varchar(50), City varchar(50), State	char(2), Related_Major1	varchar(50),Org_Type varchar(20))
BEGIN
	INSERT INTO Organizations (Name, Street, City, State, Related_Major1, Org_Type)
	VALUES (Name, Street, City, State, Related_Major1, Org_Type);
END//
delimiter ;
