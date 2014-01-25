class FriendsController < ApplicationController
  include SessionsHelper
  include UsersHelper

  def index
    @friends = Friend.all.where(:user_id => current_user.id)

    @current_user = current_user
    @find_friends = User.search(params[:search])

    # @find_users = User.where("username like ? or first_name like ? or last_name like ?", "%"+friend_params[:search]+"%", "%"+friend_params[:search]+"%", "%"+friend_params[:search]+"%")
  end


  def show
  end

  def edit
  end

  def new
  	@friend = Friend.new
  end

  def create
  end

  private
    # Never trust parameters from the scary internet, only allow the white list through.
    def friend_params
      params.require(:friend).permit(:user_id, :search)
    end
end
