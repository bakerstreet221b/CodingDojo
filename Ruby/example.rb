# comment

=begin
	long comment
	another comment
	another comment
	etc.
=end


puts "hello"
puts "Coding"
puts "Dojo"

print "hello \n"

BEGIN {
	puts "this comment gets implemented first"
}

END {
	puts "this is in the end block"
}

#################
#################


first_name = "Thereza"
last_name = "Iza"

puts first_name +" "+last_name

puts "First name is #{first_name} and last name is #{last_name}"
puts "First name is %s and last name is %s" % [first_name, last_name]

x = 50
puts "value of x is %d" % [x]
puts "value of x is %d" % x
puts "value of x is #{x}"
puts "value of x is " + x.to_s

################
################

puts "\t\t I'm 5'10\" tall"


