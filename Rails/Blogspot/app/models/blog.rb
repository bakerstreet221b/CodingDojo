class Blog < ActiveRecord::Base
	validates :name, :description, :presence => true

	has_many :posts, :owners
	has_and_belongs_to_many :users
end
