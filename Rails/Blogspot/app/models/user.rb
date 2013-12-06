class User < ActiveRecord::Base
	validates :first_name, :last_name, :email_address, :presence => true
	validates :email_address, :uniqueness => true

	has_many :owners, :posts, :messages
	has_and_belongs_to_many :blogs
end
