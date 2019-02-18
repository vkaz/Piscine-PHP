SELECT count(date) 'movies' FROM member_history 
WHERE date => '2006-10-30' AND date <= '2007-07-27'OR MONTH(date) LIKE '12' AND DAY(date) LIKE '24';