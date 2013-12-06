class CommentsController < ApplicationController

  def index
  	@comments = Comment.all

  	@comment = Comment.new(:name => "Josh")
  	@comment.save

  	session[:message] = "This is awesome!"
  	session[:user_id] = 5

  	@message = "Hi there"
  	@errors = Array.new()
  	@errors.push("Error message 1")
  	@errors.push("Error message 2")
  	@errors.push("Error message 3")
  end

  def new
  	# puts session
  	# render :text => session
  end

  def create
  	@comment = Comment.new(comment_params)
  	if @comment.save
  		#success
	else
		#fail
	end

  	puts params
  	render :text => params


  end
   private
	def comment_params
		params.require(:comment).permit(:name, :description)
	end
end
