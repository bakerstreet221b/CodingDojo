module UsersHelper

  def deny_access_to_user
    redirect_to user_path, :notice => "No access to edit this page."
  end

  def find_user(user_id)
  	@find_user = User.find(user_id)
  end


end
