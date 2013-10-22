SELECT t1.Name, t1.Population 
FROM City as t1
LEFT JOIN Country as t2 on t1.CountryCode = t2.Code
WHERE t2.Name = 'Mexico' and t1.Population > '500000'
ORDER BY t1.Population DESC;