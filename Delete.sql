delimiter //
DROP PROCEDURE DELETEORG//
CREATE PROCEDURE DELETEORG(IN name varchar(30))
BEGIN
	DELETE * FROM Organizations o WHERE o.Name = name;
END//
delimiter;