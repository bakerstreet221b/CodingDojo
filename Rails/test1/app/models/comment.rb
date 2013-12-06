class Comment < ActiveRecord::Base
	validates :description, :name, :presence => true
end
