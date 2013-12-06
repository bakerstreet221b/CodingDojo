class User < ActiveRecord::Base
	validates :first_name, :last_name, :email_address, :presence => true
	validates :email_address, :uniqueness => true

	has_secure_password
end
