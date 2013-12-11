class CreateTransactions < ActiveRecord::Migration
  def change
    create_table :transactions do |t|
      t.integer :seller
      t.integer :buyer
      t.integer :amount_dollar
      t.integer :amount_BTC

      t.timestamps
    end
  end
end
