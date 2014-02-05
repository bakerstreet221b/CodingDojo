module FriendsHelper

  def check_friend(user_id, friend_id)
    @check_friend = Friend.find_by friend_id: user_id, user_id: friend_id
    puts @check_friend.inspect
  end

  def reject_friendship(user_id, friend_id)
    @reject_friendship = Friend.where(:user_id => [user_id, friend_id], :friend_id => [user_id, friend_id])
    # puts @friend.inspect
  end
end
