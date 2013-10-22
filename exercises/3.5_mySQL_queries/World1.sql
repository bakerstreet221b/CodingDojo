SELECT t1.Name, t2.Language, t2.Percentage 
From Country as t1
LEFT JOIN CountryLanguage as t2 ON t1.Code = t2.CountryCode
WHERE t2.Language = 'Slovene'
ORDER BY t2.Percentage ASC;