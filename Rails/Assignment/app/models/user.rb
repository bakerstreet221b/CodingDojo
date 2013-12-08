class User < ActiveRecord::Base
	validates :first_name, :last_name, :email_address, :presence => true
	validates :first_name, :last_name, :length => { :maximum => 50 }

	email_regex = /\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]+)\z/i

	validates :email_address, :format => { :with => email_regex }, :uniqueness => true


	has_secure_password

	has_many :posts
end
