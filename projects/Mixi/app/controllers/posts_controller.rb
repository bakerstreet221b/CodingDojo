class PostsController < ApplicationController
	include SessionsHelper
  include CommentsHelper

  def index
  	@posts = Post.all.order(created_at: :desc)

    @post = Post.new
  end

  def show
    @post = Post.find(params[:id])
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
    def set_post
      @post = Post.find(params[:id])
    end

  	def post_params
      params.require(:post).permit(:post, :user_id)
    end
end
