class Comment < ActiveRecord::Base
  belongs_to :user
  belongs_to :post

  validates :search, :length => { :minimum => 2}
end
