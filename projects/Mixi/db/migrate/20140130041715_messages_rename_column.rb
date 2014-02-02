class MessagesRenameColumn < ActiveRecord::Migration
  def change
  	rename_column :messages, :user_id_id, :user_id
  end
end
