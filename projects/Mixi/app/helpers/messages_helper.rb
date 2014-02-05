module MessagesHelper

  def check_conversation(user_id, friend_id)
    @check_conversation = Friend.find_by friend_id: [user_id, friend_id], user_id: [friend_id, user_id]
    puts @check_conversation.inspect
  end

  def new_message
    @message = Message.new
  end
end
