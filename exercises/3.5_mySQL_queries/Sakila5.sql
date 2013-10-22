SELECT t1.title, t1.description, t1.release_year, t1.rating, t1.special_features, t2.actor_id
from film as t1
left join film_actor as t2 on t1.film_id = t2.film_id
where t1.rating = 'G' and t1.special_features like '%behind the scenes%' and t2.actor_id = 15;