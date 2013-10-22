## Advanced mySQL

(1)
SELECT sum(amount) as total 
FROM `lead-gen-business`.billing
where charged_datetime >= '2012-03-01' and charged_datetime <= '2012-03-31';

(2)
SELECT client_id, sum(amount) as total
FROM `lead-gen-business`.billing
where client_id = 2;

(3)
SELECT domain_name, client_id 
FROM `lead-gen-business`.sites
where client_id = 10;

(4)
SELECT client_id, count(site_id) as number_of_websites, MONTHNAME(created_datetime) as month_created, YEAR(created_datetime) as year_created
FROM `lead-gen-business`.sites
where client_id = 1
GROUP BY YEAR(created_datetime), MONTH(created_datetime);

(5)
SELECT count(leads_id), domain_name
FROM `lead-gen-business`.leads as t1
left join `lead-gen-business`.sites as t2 on t1.site_id = t2.site_id
where registered_datetime >= '2011-01-01' and registered_datetime <= '2011-02-15'
GROUP BY domain_name;

(6)
SELECT concat(t1.first_name, " ", t1.last_name) as client_name, count(leads_id) as number_of_leads
FROM `lead-gen-business`.clients as t1
Left join sites as t2 on t1.client_id = t2.client_id
left join leads as t3 on t2.site_id = t3.site_id
where t3.registered_datetime >= '2011-01-01' and t3.registered_datetime <= '2011-12-31'
group by t1.client_id;

(7)
SELECT concat(t1.first_name, " ", t1.last_name) as client_name, count(t3.leads_id) as number_of_leads, MONTHNAME(t3.registered_datetime) as month_generated
FROM `lead-gen-business`.clients as t1
Left join sites as t2 on t1.client_id = t2.client_id
left join leads as t3 on t2.site_id = t3.site_id
where t3.registered_datetime >= '2011-01-01' and t3.registered_datetime <= '2011-06-31'
GROUP BY t1.client_id;


(8)
SELECT concat(t1.first_name, " ", t1.last_name) as client_name, t2.domain_name as website, count(t3.leads_id) as number_of_leads
FROM `lead-gen-business`.clients as t1
Left join sites as t2 on t1.client_id = t2.client_id
left join leads as t3 on t2.site_id = t3.site_id
where t3.registered_datetime >= '2011-01-01' and t3.registered_datetime <= '2011-12-31'
group by client_name, t2.site_id;

and

SELECT concat(t1.first_name, " ", t1.last_name) as client_name, t2.domain_name as website, count(t3.leads_id) as number_of_leads
FROM `lead-gen-business`.clients as t1
Left join sites as t2 on t1.client_id = t2.client_id
left join leads as t3 on t2.site_id = t3.site_id
group by client_name, t2.site_id;

(9)
SELECT concat(t1.first_name, " ", t1.last_name) as client_name, sum(t2.amount) as total_revenue, MONTHNAME(t2.charged_datetime) as month_charged, YEAR(t2.charged_datetime) as year_charged
FROM `lead-gen-business`.clients as t1
Left join billing as t2 on t1.client_id = t2.client_id
GROUP BY t1.client_id, charged_datetime;

(10)
SELECT concat(t1.first_name, " ", t1.last_name) as client_name, GROUP_CONCAT(t2.domain_name) As sites
FROM `lead-gen-business`.clients as t1
Left join sites as t2 on t1.client_id = t2.client_id
group by t1.client_id;
