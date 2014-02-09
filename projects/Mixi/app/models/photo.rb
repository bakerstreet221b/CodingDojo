class Photo < ActiveRecord::Base
  mount_uploader :picture, PictureUploader
  belongs_to :user
  belongs_to :post
  belongs_to :message
end
