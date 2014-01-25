module UsersHelper

  def deny_access_to_user
    redirect_to user_path, :notice => "No access to edit this page."
  end

  def find_user
  	@find_users = User.where("username like ? or first_name like ? or last_name like ?", "%"+user_params[:username]+"%", "%"+user_params[:username]+"%", "%"+user_params[:username]+"%")
  end
end
