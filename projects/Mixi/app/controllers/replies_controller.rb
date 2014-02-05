class RepliesController < ApplicationController

  def index
  end

  def show
  end

  def new
    @replies = Reply.new
  end

  def edit
  end

  def create
    @reply = Reply.new(reply_params)

    respond_to do |format|
      if @reply.save
        @message_id = reply_params[:message_id]
        format.html { redirect_to message_path(id: @message_id), notice: 'User was successfully created.' }
        format.json { render action: 'show', status: :created, location: @reply }
      else
        format.html { render action: 'new' }
        format.json { render json: @reply.errors, status: :unprocessable_entity }
      end
    end
  end

  def update
    respond_to do |format|
      if @reply.update(reply_params)
        format.html { redirect_to @message, notice: 'User was successfully updated.' }
        format.json { head :no_content }
      else
        format.html { render action: 'edit' }
        format.json { render json: @reply.errors, status: :unprocessable_entity }
      end
    end
  end

  def destroy
    @reply.destroy
    respond_to do |format|
      format.html { redirect_to replies_url }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_reply
      @reply = Reply.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def reply_params
      params.require(:reply).permit(:user_id, :message_id, :reply)
    end
end
