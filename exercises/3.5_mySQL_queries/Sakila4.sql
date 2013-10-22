SELECT first_name, last_name, email, address
from customer as t1
left join address as t2 on t1.address_id = t2.address_id
where t1.store_id = 1 && t2.city_id in (1,42, 312, 459);