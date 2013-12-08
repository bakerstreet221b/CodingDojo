class Post < ActiveRecord::Base
	validates :name, :description, :user_id, :presence => true

	belongs_to :user
end
