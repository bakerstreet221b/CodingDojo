class RenameColumn < ActiveRecord::Migration
  def change
  	rename_column :friends, :user_id_id, :user_id
  	rename_column :friends, :friend_id_id, :friend_id
  end
end
