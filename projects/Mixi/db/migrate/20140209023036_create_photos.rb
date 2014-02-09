class CreatePhotos < ActiveRecord::Migration
  def change
    create_table :photos do |t|
      t.references :user_id, index: true
      t.references :post_id, index: true
      t.references :message, index: true
      t.string :name
      t.text :description
      t.string :picture

      t.timestamps
    end
  end
end
