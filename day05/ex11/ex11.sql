SELECT UPPER(last_name) 'NAME', first_name, price FROM user_card, subscription, member 
WHERE member.id_sub = subscription.id_sub AND member.id_user_card = user_card.id_user AND subscription.price > 42 
ORDER BY last_name ASC, first_name ASC;