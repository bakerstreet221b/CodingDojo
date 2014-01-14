class CreateMessages < ActiveRecord::Migration
  def change
    create_table :messages do |t|
      t.text :message
      t.integer :recipient_id
      t.references :user_id, index: true

      t.timestamps
    end
  end
end
