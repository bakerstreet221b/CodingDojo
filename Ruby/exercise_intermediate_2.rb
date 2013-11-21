# Intermediate Assignment 2

=begin
If you get stuck, consult the attr_accessor tab above.

Create a class Student that has the following attributes: @name, @dojo_location @belt_level
Create an instance of class Student and assign its attributes via the initialize function
Try to alter the values of your instance outside of the class-you should get an error
Create a getter and setter functions for the @dojo_location and @belt_level attributes and then alter those values outside of the class
Now, replace the getter and setter methods for @dojo_location and @belt_level with attr_accessor (note: you can add multiple attributes into the attr_accessor, just separate them with a comma). Look how much code you save!
=end

class Student
	attr_accessor :dojo_location, :belt_level
	def initialize str, dojo_str, belt_str
		@name = str
		@dojo_location = dojo_str
		@belt_level = belt_str
	end
	def name
		return @name
	end
end

Trey = Student.new('Trey', 'Mountain View', 'Red Belt')
puts Trey.name

puts Trey.dojo_location
Trey.dojo_location = "Sunnyvale"
puts Trey.dojo_location
puts Trey.belt_level
Trey.belt_level = "Green Belt"
puts Trey.belt_level
