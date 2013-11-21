# Basic Assignment 2

# .next .skip

# There is a method called 'next' within Ruby class Fixnum that returns the next number assigned to itself. For example, 4.next returns 5. 4.next.next would return 6. Create a new method called 'prev' and have this method be added to Ruby class Fixnum. Have prev method return the previous number assigned to itself. For example, doing 4.prev would return 3. 4.prev.prev should return 2. Now add another method called skip that would skip one number ahead of the current number. For example calling 3.skip would return 5. [hint: you can reference the value stored in Fixnum by using 'self'. for example 'return self+1').

class Fixnum
  def next
    self+1
  end
  def prev
  	self-1
  end
  def skip
  	self+2
  end
end
puts 2.next, 4.next, 4.next.next
puts 2.prev, 4.prev, 4.prev.prev
puts 2.skip, 5.skip, 6.skip.skip

# .reverse_original

# Add a new method called 'reverse_original' within Ruby class String that reverses a string without using the reverse method. Doing "abcdefg".reverse_original should return "gfedcba". Create a new method called 'reverse_original!' within the same class that changes the original string and returns true after successfully changing the string. For example if x = "abcdefg", after calling x.reverse_original!, x should now be "gfedcba". Do this without creating a temporary array. Now run the following codes: x = "Dojo"; y=x; z=x; x.reverse_original!; puts y,z,x; Why did this change the values for both y and z? This is because y and z were also referencing the same String object that was originally stored in variable x. Whenever you're changing the string value directly, it could affect other variables that were assigned from that variable. Therefore use methods with ! with caution.

class String
  def reverse_original
  	x = ""
    for i in (self.length-1).downto(0)
       x += self[i]
    end
    return x
  end
  def reverse_original!
  	x = ""
    for i in (self.length-1).downto(0)
    	x += self[i]
    end
    for y in 0...x.length
      self[y] = x[y]
    end
    return true
  end
end

x = "abcdefg"
 puts x.reverse_original
puts x
x = "Dojo"; y=x; z=x; x.reverse_original!; puts y,z,x


# .iterate iterate!

# Add a new method called 'iterate' in the Ruby class Array that goes through each value in the Array and replaces each value with whatever was passed through the block. For example for x = [1,3,5] running x.iterate { |i| i*5 } would return [5, 15, 25] while x is unchanged. Create another method iterate! that changes the array value itself. For example running x.iterate! { |i| i*5 } would cause x to be now [5, 15, 25]. (Hint: Calling self[index] where index is the index number would allow you to get/set the value store in that index). There are already methods in Ruby class Array that do what you wrote above but we want you to practice creating these methods yourself to better understand how Ruby works. For these methods you create, you're allowed to use .each_with_index (e.g. def self.each_with_index do |n, i| … end - seehttp://www.robertsosinski.com/2008/12/21/understanding-ruby-blocks-procs-and-lambdas/ for some hint)


class Array
	def iterate
		x = Array.new
		self.each_with_index do |n, i|
        	x[i] = yield(n)
    	end
    	return x
	end
	def iterate!
		self.each_with_index do |n, i|
        	self[i] = yield(n)
    	end
	end
end

x = [1,3,5]
puts x.iterate { |i| i*5 }
puts x
puts x.iterate! { |i| i*5 }
puts x

# .filter

# Add a new method called 'filter' in the Ruby class Array that goes through each value in the Array and filters any value in the array that's not meeting the requirement set in the block. For example for x = [1, 10, 25], running x.filter { |i| i < 15 } would return [25] while x is left unchanged. In other words with the previous example it's filtering any value in the array x where each value is less than 15. Similarly, create another method called 'filter!' that returns [25] in the previous example but would now change x to also be [25]. Note that Ruby also has a method that does exactly this as well.

class Array
	def filter
    x = Array.new
		self.each_with_index do |n, i|
      if yield(n) == false
        x.push(self[i])
      end
		end
    return x
	end
	def filter!
    x = Array.new
    self.each_with_index do |n, i|
      if yield(n)
        x.push(self[i])
      end
    end
    x.each do |del|
      self.delete_at(self.index(del))
    end
	end
end
x = [1, 10, 25, 35, 4, 16]

puts x.filter { |i| i < 15 }
puts x

x.filter! { |i| i < 15 }
puts x



# .foreach

# Add a new method called 'foreach' in the Ruby class Hash where you can pass a block. Your method should pass both the key and the value to the block. This method should go through each element in the Hash and do whatever is passed by the block. For example say that h = { :name => 'Dojo', :zip code => 94043}. Calling h.foreach{ |key, value| puts "#{key} is #{value}" } should print out "name is Dojo" as well as "zip code is 94043". Note that Ruby already has an identical method to this new method you created. It's called .each method and is one of the most used methods in Ruby. We still wanted you to do this exercise to 1) help you learn how to use blocks as well as methods to handle these blocks and 2) also to know that all the Ruby methods are pre-defined methods that you should also be able to code with basic for loops, if/else statements, and now with blocks!

class Hash
	def foreach
    x = self.to_a
    for i in 0...x.length
      yield(x[i])
    end
	end
end

h = { :name => 'Dojo', :zip_code => 94043}
h.foreach{ |key, value| puts "#{key} is #{value}" }
puts h