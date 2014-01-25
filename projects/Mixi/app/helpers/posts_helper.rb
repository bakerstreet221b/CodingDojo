module PostsHelper

  def find_username
  	@username = User.find_by_id(post_params[:user_id])
  end
end
