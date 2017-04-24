DELIMITER //
CREATE TRIGGER numOrdre_insert
	AFTER INSERT
	ON TypeCateg
	FOR EACH ROW
	BEGIN
		UPDATE TypeCateg
		SET (numOrdre = (SELECT MAX(numOrdre)
									FROM numOrdre
									WHERE lettreCategorie= NEW.lettreCategorie)+1)
		WHERE lettreCategorie= NEW.lettreCategorie
			AND libelle= NEW.libelle
	END//
DELIMITER ;
