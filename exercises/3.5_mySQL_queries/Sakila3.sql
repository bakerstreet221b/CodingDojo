SELECT title, description, release_year
from film as t1
left join film_actor as t2 on t1.film_id = t2.film_id
where t2.actor_id = '5';

