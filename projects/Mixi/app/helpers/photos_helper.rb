module PhotosHelper
	def avatar(user_id)
    @avatar = Photo.where(:user_id => user_id, :avatar => "set")
	end

  def default_avatar
    @default_avatar = Photo.first
  end
end
