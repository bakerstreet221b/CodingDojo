module UsersHelper

  def deny_access_to_user
    redirect_to user_path, :notice => "No access to edit this page."
  end

  def users
  	@users = User.all
  end
end
