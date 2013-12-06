class CreateOwners < ActiveRecord::Migration
  def change
    create_table :owners do |t|
      t.references :blogs, index: true
      t.references :users, index: true

      t.timestamps
    end
  end
end
