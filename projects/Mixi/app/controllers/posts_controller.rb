class PostsController < ApplicationController
	include SessionsHelper

  def index
  	@posts = Post.all

    @post = Post.new
  end

  def show
  end

  def new
  	@post = Post.new
  end

  def create
  	@post = Post.new(post_params)
    puts @post.inspect

  	respond_to do |format|
      if @post.save
        format.html { redirect_to posts_path, notice: 'Post was successfully created.' }
        format.json { render action: 'home', status: :created, location: @posts }
      else
        format.html { render action: 'new' }
        format.json { render json: @post.errors, status: :unprocessable_entity }
      end
    end
  end

  private
  	def post_params
      params.require(:post).permit(:post, :user_id)
    end
end
