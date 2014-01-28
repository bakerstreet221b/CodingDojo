class Friend < ActiveRecord::Base
  belongs_to :user
  # belongs_to :friend

  def self.search(search)
    if search
      find(:all, :conditions => ['user_id LIKE ?', "%#{search}%"])
    else
      find(:all)
    end
  end
end