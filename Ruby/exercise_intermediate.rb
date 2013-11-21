# Intermediate Assignment

=begin
Create a two hashes named monster1 and monster2 and assign values: health = 500. Create a for loop that ranges from 1 to 5 and declare their attack damages (random number that has a max value of 100) inside the loop. The loop should run just 5 times so that means the battle only lasts 5 rounds. Have the damage minus to their health. After the loop, check who has the greater health and declare that monster as the winner.

Example:

ROUND 1:
monster1 attacks monster2 with 100 damage
monster2's health is now 400/500
monster 2 attacks monster1 with 50 damage
monster1's health is now 450/500
.......
ROUND 5:
monster1 attacks monster2 with 50 damage
monster2's health is now 210/500
monster2 attacks monster1 with 95 damage
moster1's health is now 195/500
monster2 wins the game!
=end

monster1 = {:health => 500}
monster2 = {:health => 500}

for i in 1...5
	x = rand(0...100)
	y = rand(0...100)
	monster2[:health] -= x
	monster1[:health] -= y

	puts "ROUND #{i}:"
	puts "monster1 attacks monster2 with #{x} damage"
	puts "monster2's health is now #{monster2[:health]}/500"
	puts "monster2 attacks monster1 with #{y} damage"
	puts "monster1's health is now #{monster1[:health]}/500"
end

if monster1[:health] > monster2[:health]
	 puts "monster1 wins the game!"
else
	puts "monster2 wins the game!"
end