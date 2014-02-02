class AddRequestToFriends < ActiveRecord::Migration
  def change
    add_column :friends, :request, :string
  end
end
