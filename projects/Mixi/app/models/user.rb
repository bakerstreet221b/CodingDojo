class User < ActiveRecord::Base
  validates :username, :first_name, :last_name, :email, :presence => true
  validates :username, :first_name, :last_name, :length => { :maximum => 50 }


  email_regex = /\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]+)\z/i

  validates :email, :format => { :with => email_regex }, :uniqueness => true


  has_secure_password

  def self.search(search)
    if search
      find(:all, :conditions => ['username LIKE ? or first_name like ? or last_name like ?', "%#{search}%", "%#{search}%", "%#{search}%"])
    else
      []
    end
  end
end
