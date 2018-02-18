delimiter //
DROP PROCEDURE IF EXISTS UpdateOrg//
CREATE PROCEDURE UpdateOrg(IN  name varchar(30), name2 varchar(30),street varchar(50),city varchar(50), state varchar(50), relatedm varchar(50), orgtype varchar(20))
BEGIN
	IF (name2 IS NOT NULL) THEN
		UPDATE Organizations SET Name = name2 WHERE Name = name;
	END IF; 
	IF (street IS NOT NULL) THEN
		UPDATE Organizations SET Street = street WHERE Name = name;
	END IF;
	IF (city IS NOT NULL) THEN
		UPDATE Organizations SET City = city WHERE Name = name;
	END IF;
	IF (state IS NOT NULL) THEN
		UPDATE Organizations SET State= state WHERE Name = name;
	END IF;
	IF  (relatedm IS NOT NULL) THEN
		UPDATE Organizations  SET Related_Major1 = relatedm WHERE Name = name;
	END IF;
	IF (orgtype IS NOT NULL) THEN
		UPDATE Organizations SET Org_Type = orgtype WHERE Name = name;
	END IF;
END//
delimiter ;