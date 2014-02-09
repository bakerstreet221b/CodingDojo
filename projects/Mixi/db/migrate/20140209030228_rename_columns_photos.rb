class RenameColumnsPhotos < ActiveRecord::Migration
  def change
  	rename_column :photos, :post_id_id, :post_id
  	rename_column :photos, :user_id_id, :user_id
  end
end
