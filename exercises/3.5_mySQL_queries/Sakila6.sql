SELECT t1.first_name, t1.last_name, t1.last_update
FROM sakila.actor as t1
left join film_actor as t2 on t1.actor_id = t2.actor_id
where film_id = 369;