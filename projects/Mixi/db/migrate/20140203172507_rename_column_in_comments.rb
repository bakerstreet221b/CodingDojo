class RenameColumnInComments < ActiveRecord::Migration
  def change
  	rename_column :comments, :post_id_id, :post_id
  end
end
