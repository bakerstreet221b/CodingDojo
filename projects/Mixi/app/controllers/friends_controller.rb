class FriendsController < ApplicationController
  include SessionsHelper
  include FriendsHelper


  def index
    @friends = Friend.all.where(:friend_id => current_user.id)
    # Friend.where(:user_id => [5,4], :friend_id => [5, 4])

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
    # puts @friend.inspect

    @return_friendship = Friend.new(:user_id => friend_params[:friend_id], :friend_id => friend_params[:user_id], :request => "received")

    respond_to do |format|
      if @friend.save and @return_friendship.save
        format.html { redirect_to friends_path, notice: 'Friendship was successfully created.' }
        format.json { render action: 'index', status: :created, location: @friends }
      else
        format.html { render action: 'new' }
        format.json { render json: @post.errors, status: :unprocessable_entity }
      end
    end
  end

  def update
    @friend = Friend.find_by(:user_id => friend_params[:friend_id], :friend_id => friend_params[:user_id])

    @return_friendship = Friend.find_by(:user_id => friend_params[:user_id], :friend_id => friend_params[:friend_id])


    # if @update_friendship.update_attributes(friend_params)
    # redirect_to root_path
    # end

    respond_to do |format|
      if @friend.update(request: 'accepted') and @return_friendship.update(request: 'accepted')
        format.html { redirect_to friends_path, notice: 'Friendship was successfully created.' }
        format.json { render action: 'index', status: :created, location: @friends }
      else
        format.html { render action: 'new' }
        format.json { render json: @post.errors, status: :unprocessable_entity }
      end
    end
  end

  def destroy
    set_friend
    @friend.destroy
    respond_to do |format|
      format.html { redirect_to friends_url }
      format.json { head :no_content }
    end
  end


  private
    def set_friend
      @friend = Friend.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def friend_params
      params.require(:friend).permit(:user_id, :friend_id, :request, :search)
    end
end
