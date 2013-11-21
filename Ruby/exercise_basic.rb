# Basic assignment 1

puts "Enter the first number"
first_number = gets.chomp
puts "Enter the second number"
second_number = gets.chomp

x = rand(1..4)
if x == 1
	answer = first_number.to_i + second_number.to_i
	operation = "Addition"
elsif x == 2
	answer = first_number.to_i - second_number.to_i
	operation = "Subtraction"
elsif x ==
	answer = first_number.to_i * second_number.to_i
	operation = "Multiplication"
else
	answer = first_number.to_i / second_number.to_i
	operation =  "Division"
end

puts "\n first_number = #{first_number}"
puts "\n second_number = #{second_number}"
puts "\n The answer is #{answer}"
puts "Operation used is #{operation}"


