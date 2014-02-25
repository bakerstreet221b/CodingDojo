module PhotosHelper
	def avatar(user_id)
    @avatar = Photo.where(user_id: user_id, avatar: "1")
	end

  def default_avatar
    @default_avatar = Photo.first
  end

  def friend_pictures
  	@friend_pictures = Photo.where(user_id: params["format"]).order('created_at DESC')
  end

  def last_20_pics(user_id)
  	@last_20_pics = Photo.where(user_id: user_id).order('created_at DESC').first(20)
  end
end
