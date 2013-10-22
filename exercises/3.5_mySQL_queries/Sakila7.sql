SELECT title, description, release_year, rating, special_features, t3.name as genre
FROM sakila.film as t1
left join film_category as t2 on t1.film_id = t2.film_id
left join category as t3 on t2.category_id = t3.category_id
where t3.name = 'Drama' and t1.rental_rate = 2.99;