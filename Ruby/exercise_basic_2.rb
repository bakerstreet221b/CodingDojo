# Basic Assignment 2

=begin
Create an array with the following values: 3,5,1,2,7,9,8,13,25,32. Return the sum of all numbers in the array. Also have it return an array that only include numbers that are greater than 10 (E.g. when you pass the array above, it should return an array with the values of 13,25,32 - hint: use reject or find_all method)

Create an array with the following values: John, KB, Oliver, Cory, Matthew, Christopher. Shuffle the array and print the name of each person. Have the program also return an array with names that are longer than 5 characters.

Create an array that contains all 26 letters in the alphabet (this array must have 26 values). Shuffle the array and display the last letter of the array. Have it also display the first letter of the array. If the first letter in the array is a vowel, have it display a message

Generate an array with 10 random numbers between 55-100.

Generate an array with 10 random numbers between 55-100 and have it be sorted (showing the smallest number in the beginning). Display all the numbers in the arrays. Next, display the minimum value in the array as well as the maximum value.

Create a random string that is 5 characters long (hint: (65+rand(26)).chr returns a random character; use a map function and a range to do this).

Generate an array with 10 random strings that are each 5 characters long
=end


array = [3,5,1,2,7,9,8,13,25,32]
sum = 0
array.each {|i| sum += i}
y = array.find_all {|i| i > 10 }
puts sum
puts y

##########

array = %w[John, KB, Oliver, Cory, Matthew, Christopher]
x = array.shuffle
x.each {|i| puts i}
y = x.find_all {|i| i.length > 5}
puts y

###########

array = []
("a".."z").each {|i| array.push(i)}
x = array.shuffle
print x
puts "\n" + x.last

a = (x[0] =~ (/[aeiou]/)) == 0? "First letter in array is a vowl" :  x[0]
puts a
############

x = []
10.times{|i| x.push(i=rand(55..100))}

############

x = []
10.times{|i| x.push(i=rand(55..100))}
puts x.sort
puts x.min
puts x.max
###########

a = []
(1..5).each {|i| a.push((65+rand(26)).chr) }
puts a.join

b = (1..5).collect {|i| i = (65+rand(26)).chr}
puts b.join

###########
x = []
10.times{|i| x.push((1..5).collect {|i| i = (65+rand(26)).chr}.join)}

print x


