delimiter //
DROP PROCEDURE IF EXISTS UpdateOrg//
CREATE PROCEDURE UpdateOrg(IN  name varchar(30), name2 varchar(30),street varchar(50),city varchar(50), state varchar(50), relatedm varchar(50), orgtype varchar(20))
BEGIN
	IF name2 IS NOT NULL THEN
		UPDATE Organizations o SET o.Name = name2 WHERE o.Name = name 
	END IF;
	IF street IS NOT NULL THEN
		UPDATE Organizations o SET o.Street = street WHERE o.Name = name
	END IF;
	IF city IS NOT NULL THEN
		UPDATE Organizations o SET o.City = city WHERE o.Name = name
	END IF;
	IF state IS NOT NULL THEN
		UPDATE Organizations o SET o.State= state WHERE o.Name = name
	END IF;
	IF  relatedm IS NOT NULL THEN
		UPDATE Organizations o SET o.Related_Major1 = relatedm WHERE o.Name = name
	END IF;
	IF orgtype IS NOT NULL THEN
		UPDATE Organizations o SET o.Org_Type = orgtype WHERE o.Name = name
	END IF;
END//
delimiter ;