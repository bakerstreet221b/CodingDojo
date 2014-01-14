class CreateFriends < ActiveRecord::Migration
  def change
    create_table :friends do |t|
      t.references :user_id, index: true
      t.references :friend_id, index: true

      t.timestamps
    end
  end
end
