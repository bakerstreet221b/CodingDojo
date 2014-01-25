class FriendsController < ApplicationController
  include SessionsHelper

  def index
    @friends = Friend.all.where(:user_id => current_user.id)

    @find_friends = User.search(params[:search])

    @friend = Friend.new
  end


  def show
  end

  def edit
  end

  def new
  	@friend = Friend.new
  end

  def create
    @friend = Friend.new(friend_params)
    puts @friend.inspect

    respond_to do |format|
      if @friend.save
        format.html { redirect_to friends_path, notice: 'Friendship was successfully created.' }
        format.json { render action: 'index', status: :created, location: @friends }
      else
        format.html { render action: 'new' }
        format.json { render json: @post.errors, status: :unprocessable_entity }
      end
    end
  end

  private
    # Never trust parameters from the scary internet, only allow the white list through.
    def friend_params
      params.require(:friend).permit(:user_id, :friend_id, :search)
    end
end
