class Post < ActiveRecord::Base

	validates :content, :name, :presence => true
	validates :content, :length => { :minimum => 5 }

	has_many :comments, :dependent => :destroy
end
