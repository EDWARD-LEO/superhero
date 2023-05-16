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


DELIMITER $$
CREATE PROCEDURE spu_superhero_filter_multiple
(
	IN _race_id 		INT,
	IN _gender_id 		INT,
	IN _alignment_id	INT
)
BEGIN
	SELECT
		superhero.`id`,
		superhero.`superhero_name`,
		colour.`colour` 'hair_colour',
		publisher.`publisher_name`,
		superhero.`weight_kg`
	FROM superhero
		INNER JOIN colour ON colour.`id` = superhero.`hair_colour_id`
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	WHERE 	superhero.`race_id` = _race_id 		AND 
				superhero.`gender_id` = _gender_id 	AND
				superhero.`alignment_id` = _alignment_id
	ORDER BY superhero.`id`;
END $$

/* Contabilizar cuántos super hérores existen por bando (alignment) */
DELIMITER $$
CREATE PROCEDURE spu_superhero_alignment_resume()
BEGIN
	SELECT	
			CASE
				WHEN  alignment.`alignment` IS NULL THEN 'Ninguno'
				WHEN  alignment.`alignment` IS NOT NULL THEN alignment.`alignment`
			END 'alignment',
				COUNT(superhero.`id`) 'total'
		FROM superhero
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
		GROUP BY alignment.`alignment`;
END $$

CALL spu_superhero_alignment_resume();