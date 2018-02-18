/*Find the dates and exchanges where that exchange has more than x trades per minute, while the exchange specific Bitcoin price has been below y.*/
delimiter //
DROP PROCEDURE IF EXISTS InsertOrg//
CREATE PROCEDURE InsertOrg(IN nm varchar(30), strt varchar(50), city varchar(50), state	char(2), relmaj1 varchar(50), orgtype varchar(20))
BEGIN
	INSERT INTO Organizations (Name, Street, City, State, Related_Major1, Org_Type)
	VALUES (nm, strt, city, state, relmaj1, orgtype);

	SELECT "Your information was inserted correctly." AS 'Result';
END//
delimiter ;
