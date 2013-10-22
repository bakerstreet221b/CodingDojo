SELECT Region, count(Name) as total
From Country
GROUP BY Region
ORDER BY total DESC;