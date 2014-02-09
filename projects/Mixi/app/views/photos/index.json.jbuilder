json.array!(@photos) do |photo|
  json.extract! photo, :id, :user_id, :name, :description, :picture
  json.url photo_url(photo, format: :json)
end
