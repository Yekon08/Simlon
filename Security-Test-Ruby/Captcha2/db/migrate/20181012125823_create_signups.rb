class CreateSignups < ActiveRecord::Migration[5.2]
  def change
    create_table :signups do |t|
      t.string :name
      t.string :password
      t.string :email
      t.text :comments

      t.timestamps
    end
  end
end
