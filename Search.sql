/*Find the dates and exchanges where that exchange has more than x trades per minute, while the exchange specific Bitcoin price has been below y.*/
delimiter //
DROP PROCEDURE IF EXISTS SearchByInterest//
CREATE PROCEDURE SearchByInterest(IN orgtype varchar(20))
BEGIN
	SELECT * FROM Organizations
	WHERE Org_Type = orgtype;
END//
delimiter ;
