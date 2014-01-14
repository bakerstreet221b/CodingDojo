class PostsController < ApplicationController
  include PostsHelper

  def index
  	@posts = Post.all
  end

  def new
  	@post = Post.new
  end

  def create
   #  @user = User.find(post_params[:user_id])
  	# @post = @user.posts.new(post_params)
    @post = Post.new(post_params)
    puts @comment.inspect

  	if @post.save
  		redirect_to user_path(post_params[:user_id]), notice: 'Comment was successfully created.'
  	else
  		redirect_to user_path(post_params[:user_id]), notice: 'Comment was not created.'
  	end
  end

  private
  def post_params
  	params.require(:post).permit(:name, :description, :user_id)
  end
end
