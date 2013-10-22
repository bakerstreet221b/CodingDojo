SELECT t1.Name, count(t2.Name) as total
FROM Country as t1
left JOIN City as t2 on t1.Code = t2.CountryCode
GROUP BY t1.Name
ORDER BY total DESC;
