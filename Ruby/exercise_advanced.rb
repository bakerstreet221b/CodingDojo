# Advanced Assignment

# HINT: To do this exercise, you will probably have to use 'return self'. If the method returns itself (an instance of itself), we can chain methods.

# Develop a ruby class called MathDojo that has the following functions: add, subtract. Have these 2 functions take at least 1 parameter. MathDojo.new.add(2).add(2, 5).subtract(3, 2) should perform 0+2+(2+5)-(3+2) and return 4.
# Modify MathDojo to take array as a parameter with as many value passed in the array as needed. (e.g. MathDojo.new.add(1).add([3, 5, 7, 8], [2, 4.3, 1.25]).subtract([2,3], [1.1, 2.3]) should do 0+1+(3+5+7+8)+(2+4.3+1.25)-(2+3)-(1.1+2.3)
# Once done, upload your codes below (in a zipped format)

class MathDojo
	def initialize
		@sum = 0
	end
	def add(int, *rest)
		int.class == Fixnum ?	@sum += int : int.each{|i| @sum += i}
		rest.each{|i| i.class == Fixnum ? @sum += i : i.each {|y| @sum += y}}
		return self
	end
	def subtract(int, *rest)
		int.class == Fixnum ? @sum -= int : int.each {|i| @sum -= i}
		rest.each {|i| i.class == Fixnum ? @sum -= i : i.each {|y| @sum -= y}}
		return self
	end
	def sum
		return @sum
	end
end

x = MathDojo.new.add(2,3)
y = MathDojo.new.add(2).add(2, 5)
z = MathDojo.new.add(2).add(2, 5).subtract(3, 2)
a = MathDojo.new.add(1).add(8, [2, 4.3, 1.25])
b = MathDojo.new.add(1).add([3, 5, 7, 8], [2, 4.3, 1.25]).subtract([2,3], [1.1, 2.3])

puts x.sum
puts y.sum
puts z.sum
puts a.sum
puts b.sum