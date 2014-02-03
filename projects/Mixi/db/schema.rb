# encoding: UTF-8
# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 20140203180341) do

  create_table "comments", force: true do |t|
    t.text     "comment"
    t.integer  "user_id"
    t.integer  "post_id"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "comments", ["post_id"], name: "index_comments_on_post_id"
  add_index "comments", ["user_id"], name: "index_comments_on_user_id"

  create_table "friends", force: true do |t|
    t.integer  "user_id"
    t.integer  "friend_id"
    t.datetime "created_at"
    t.datetime "updated_at"
    t.string   "request"
  end

  add_index "friends", ["friend_id"], name: "index_friends_on_friend_id"
  add_index "friends", ["user_id"], name: "index_friends_on_user_id"

  create_table "funds", force: true do |t|
    t.integer  "amount_dollar"
    t.integer  "amount_BTC"
    t.integer  "user_id"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "funds", ["user_id"], name: "index_funds_on_user_id"

  create_table "messages", force: true do |t|
    t.text     "message"
    t.integer  "friend_id"
    t.integer  "user_id"
    t.datetime "created_at"
    t.datetime "updated_at"
    t.string   "subject"
  end

  add_index "messages", ["friend_id"], name: "index_messages_on_friend_id"
  add_index "messages", ["user_id"], name: "index_messages_on_user_id"

  create_table "order_buys", force: true do |t|
    t.integer  "ammount_BTC"
    t.integer  "user_id"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "order_buys", ["user_id"], name: "index_order_buys_on_user_id"

  create_table "order_sells", force: true do |t|
    t.integer  "ammount_BTC"
    t.integer  "user_id"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "order_sells", ["user_id"], name: "index_order_sells_on_user_id"

  create_table "posts", force: true do |t|
    t.text     "post"
    t.integer  "user_id"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "posts", ["user_id"], name: "index_posts_on_user_id"

  create_table "replies", force: true do |t|
    t.integer  "message_id"
    t.integer  "user_id"
    t.text     "reply"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "replies", ["message_id"], name: "index_replies_on_message_id"
  add_index "replies", ["user_id"], name: "index_replies_on_user_id"

  create_table "transactions", force: true do |t|
    t.integer  "seller"
    t.integer  "buyer"
    t.integer  "amount_dollar"
    t.integer  "amount_BTC"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "users", force: true do |t|
    t.string   "username"
    t.string   "first_name"
    t.string   "last_name"
    t.string   "email"
    t.string   "password_digest"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

end
