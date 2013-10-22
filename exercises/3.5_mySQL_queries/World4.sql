SELECT t2.Name, t1.Language, t1.Percentage 
FROM CountryLanguage as t1 
LEFT JOIN Country as t2 ON t1.CountryCode = t2.Code
WHERE t1.Percentage > '89'
ORDER BY t1.Percentage DESC;