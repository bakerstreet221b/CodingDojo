class Friend < ActiveRecord::Base
  belongs_to :user_id
  belongs_to :friend_id

  def self.search(search)
    if search
      find(:all, :conditions => ['user_id LIKE ?', "%#{search}%"])
    else
      find(:all)
    end
  end
end
