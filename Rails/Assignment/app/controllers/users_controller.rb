class UsersController < ApplicationController

  def index
  	@users = User.all
  end

  def new
  	@user = User.new
  end

  def show
    @user = User.find(params[:id])
  end

  def create
  	@user = User.new(user_params)

  	if @user.save
      redirect_to @user, notice: 'User was successfully created.'
      # redirect_to :action => 'index'
  	else
      render :new
  	end

	# render :text => params

  end

  def edit
    @user = User.find(params[:id])
  end

  def update
    @user = User.find(params[:id])

    respond_to do |format|
      if @user.update(user_params)
        format.html { redirect_to @user, notice: 'User was successfully updated.' }
      else
        format.html { render action: 'edit' }

      end
    end
  end

  def destroy
    @user = User.find(params[:id])
    @user.destroy

    if @user.destroy
      redirect_to :action => 'index'
    else
      render :new
    end
  end


  private
  def user_params
  	params.require(:user).permit(:first_name, :last_name, :email_address, :password, :password_confirmation)
  end
end
