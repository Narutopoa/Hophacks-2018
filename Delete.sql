delimiter //
DROP PROCEDURE IF EXISTS DELETEORG//
CREATE PROCEDURE DELETEORG(IN name varchar(30))
BEGIN
	DELETE FROM Organizations WHERE Name = name;
END//
delimiter ;