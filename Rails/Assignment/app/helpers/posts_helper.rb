module PostsHelper

  def post_to(user)
    posts = Post.all.where(:user_id => user.id)
  end

  def new_post
  	@post = Post.new
  end




end
