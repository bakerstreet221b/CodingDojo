SELECT t1.Name, t2.Name, t2.District, t2.Population
From Country as t1
LEFT JOIN City as t2 ON t1.Code = t2.CountryCode
WHERE t2.District = 'Buenos Aires' and t2.Population > '500000';