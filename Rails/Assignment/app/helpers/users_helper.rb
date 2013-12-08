module UsersHelper

  def id_of_user
    @user_id = @user.id
  end

  def users
  	@users = User.all
  end
end
