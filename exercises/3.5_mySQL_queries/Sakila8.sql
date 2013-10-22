SELECT title, description, release_year, rating, special_features, t3.name as genre, t5.first_name, t5.last_name
FROM sakila.film as t1
left join film_category as t2 on t1.film_id = t2.film_id
left join category as t3 on t2.category_id = t3.category_id
left join film_actor as t4 on t1.film_id = t4.film_id
left join actor as t5 on t4.actor_id = t5.actor_id
where t3.name = 'Action' and billingt5.first_name = 'Sandra' and t5.last_name = 'Kilmer';