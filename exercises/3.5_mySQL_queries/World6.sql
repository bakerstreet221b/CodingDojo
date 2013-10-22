SELECT Name, GovernmentForm, Capital, LifeExpectancy  
FROM Country
WHERE GovernmentForm = 'Constitutional Monarchy' and Capital > '200' and LifeExpectancy > '75';