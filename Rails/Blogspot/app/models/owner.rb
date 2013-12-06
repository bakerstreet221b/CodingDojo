class Owner < ActiveRecord::Base
  belongs_to :blog
  belongs_to :user
end
