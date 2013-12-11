class CreateFunds < ActiveRecord::Migration
  def change
    create_table :funds do |t|
      t.integer :amount_dollar
      t.integer :amount_BTC
      t.references :user, index: true

      t.timestamps
    end
  end
end
