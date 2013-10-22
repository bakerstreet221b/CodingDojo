SELECT t1.first_name, t1.last_name, t1.email, t2.address
from customer as t1
left join address as t2 on t1.address_id = t2.address_id
where t2.city_id = '312';
