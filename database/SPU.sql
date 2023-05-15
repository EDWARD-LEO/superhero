USE superhero;

DELIMITER $$
CREATE PROCEDURE spu_superhero_list(IN _publisher_id INT)
BEGIN
	SELECT
		superhero.`id`,
		superhero.`superhero_name`,
		superhero.`full_name`,
		gender.`gender`,
		c1.`colour`,
		c2.`colour`,
		c3.`colour`,
		race.`race`,
		publisher.`publisher_name`,
		alignment.`alignment`,
		superhero.`height_cm`,
		superhero.`weight_kg`
	FROM superhero
		INNER JOIN gender ON gender.`id` = superhero.`gender_id`
		INNER JOIN colour c1 ON c1.`id` = superhero.`eye_colour_id`
		INNER JOIN colour c2 ON c2.`id` = superhero.`hair_colour_id`
		INNER JOIN colour c3 ON c3.`id` = superhero.`skin_colour_id`
		LEFT JOIN race ON race.`id` = superhero.`race_id`
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
	WHERE superhero.`publisher_id` = _publisher_id
	ORDER BY superhero.`id`;
END $$

CALL spu_superhero_list(2);