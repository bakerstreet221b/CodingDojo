# Rails - Basic assignment 1                                                                     #
#
# Create a new project using rails new project - have it connect to your mysql database successfully
# Create a new model called 'User' with information above
# Have rails automatically create an automatic incrementing primary field called ID as well as created_at and updated_at timestamps
# Create a few records in the users table using the ruby console
# Get familiar with .save, .valid?, .new_record?
# Make sure prior to validations, you know how to add a new record even if some of the fields are empty
# Now add validations to the model so that
# it requires the presence of the all four fields
# it requires the age to be numeric
# it requires the first_name and the last_name to be at least 2 characters each
# it requires the age to be at least 10 and below 150 (look into http://apidock.com/rails/ActiveModel/Validations/HelperMethods/validates_numericality_of for some help)
# use .errors and .errors.full_messages so that you can see/display the error messages when the validations are failing
# Using the ruby console
# see if it allows you to insert some records when the fields are not meeting the validation rules we set (e.g. try to create a record where age is 5 or above 150, or where first name is just one character, etc)
# make sure your console returns appropriate error messages when you try to save something that's not meeting the validation rules
# Know how to retrieve all users
# Know how to get the first user
# Know how to get the last user
# Know how to get the users sorted by their first name (order by first_name DESC)
# Get the record of user whose id is 3 and UPDATE the person's last_name to something else.  Know how to do this directly in the console using .find and .save
# Know how to delete a record of a user whose id is 4 (use something like User.find(2).destroy...).


1. rails new user_login_project -d mysql
2. rails g model User first_name:string last_name:string email_address:string age:integer
3. rake db:create
   rake db:migrate
4.    :first_name => "Isabella", :last_name => "Gomez", :email_address => "isa@example.com", :age => 10.7).save
7. user_login_project/app/models/user.rb
    class User < ActiveRecord::Base

    	validates :first_name, :last_name, :email_address, :age, :presence => true
    	validates :first_name, :last_name, :length => { :minimum => 2 }

    	validates :age, numericality: { only_integer: true, greater_than_or_equal_to: 10, less_than: 150  }
    end

8.3 User.all
8.4 User.first
8.5 User.last
8.6 User.all.order(first_name: :desc)
8.7 u = User.find(3)
    u.last_name = "Harris"
    u.save
8.8 User.find(4).destroy
8.9 Ninja.select("first_name").where(dojo_id: 2).order(created_at: :desc)