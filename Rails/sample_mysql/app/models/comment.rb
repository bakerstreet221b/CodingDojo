class Comment < ActiveRecord::Base
  belongs_to :post

  validates :body, :commenter, :presence => true
end
