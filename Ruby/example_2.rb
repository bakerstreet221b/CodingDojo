class CodingDojo
  @@no_of_branches = 0
  def initialize(id, name, address)
    @branch_id = id
    @branch_name = name
    @branch_address = address
    @@no_of_branches += 1
    puts "\nCreated branch #{@@no_of_branches}"
  end
  def hello
    puts "Hello CodingDojo!"
  end
  def displayAll
    puts "Branch ID: %d" % @branch_id
    puts "Branch Name: %s" % @branch_name
    puts "Branch Address: %s" % @branch_address
  end
end
# now using above class to create objects
branch = CodingDojo.new(253, "SF CodingDojo", "Sunnyvale CA")
branch.displayAll
branch2 = CodingDojo.new(155, "Boston CodingDojo", "Boston MA")
branch2.displayAll


def test(a1="Ruby", a2="Perl")
  puts "The programming language is #{a1}"
  puts "The programming language is #{a2}"
end
test "C", "C++"
test

##################
##################

def square(num)
  puts "num is #{num}"

  x = yield(num)
  puts "x has a value of #{x}"

  y = yield(num) * x
  puts "y has a value of #{y}"
end

square(5) {|i| i*i }

#####################
#####################


puts "Enter the first number"
a = gets.chomp
puts "Enter the second number"
b= gets.chomp
puts "The sum is", a.to_i+b.to_i