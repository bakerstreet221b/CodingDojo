class CreateOrderBuys < ActiveRecord::Migration
  def change
    create_table :order_buys do |t|
      t.integer :ammount_BTC
      t.references :user, index: true

      t.timestamps
    end
  end
end
