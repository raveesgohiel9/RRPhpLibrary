/*
*  view to get user and resto info together
*/
CREATE VIEW USERNRESTO AS

SELECT * FROM users LEFT OUTER JOIN restaurants ON 
users.resto_id=restaurants.resto_id order by users.user_id asc
