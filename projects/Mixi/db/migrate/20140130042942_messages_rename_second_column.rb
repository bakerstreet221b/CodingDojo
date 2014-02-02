class MessagesRenameSecondColumn < ActiveRecord::Migration
  def change
  	rename_column :messages, :recipient_id, :friend_id
  end
end
