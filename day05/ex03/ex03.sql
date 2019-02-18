INSERT INTO ft_table (`login`, `group`, `creation_date`) 
SELECT last_name, 'other', birthdate FROM user_card 
WHERE LOCATE('a', last_name) > 0 AND LENGTH(last_name) < 9 ORDER BY last_name ASC LIMIT 10;