SELECT t1.title, t1.description, t1.release_year, t1.rating, t1.special_features, t3.name as genre
from film as t1
left join film_category as t2 on t1.film_id = t2.film_id
left join category as t3 on t2.category_id = t3.category_id
where t3.name = 'Comedy';

