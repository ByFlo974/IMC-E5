DELIMITER //

CREATE TRIGGER after_insert_update_utilisateur
AFTER INSERT OR UPDATE ON utilisateur
FOR EACH ROW
BEGIN
    INSERT INTO mdp_log (mdp, idUtilisateur)
    VALUES (NEW.mdp, NEW.id);
END//

DELIMITER ;
