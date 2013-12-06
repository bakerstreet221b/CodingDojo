# # Rails - Advanced assignment                                                                      #

# Be able to create 5 users
# Be able to create 5 blogs
# To add the first user to the last blog, you would do the following: User.first.blogs = [Blog.last]. To add both the first and the last blog to the first user, you would do User.first.blogs = [Blog.first, Blog.last]. What would you do to add the second and third user to the second blog?
# Have the first user create 3 posts, assign the first 2 posts to the first blog and the last post to the last blog
# You can create a new blog for the user by calling: "User.first.blogs.create(:name => "New Blog", :description => "New Description")". How would you create a new post that belongs to the second blog? How would you indicate that this new post was created by the first user?
# You can retrieve the user that owns the post id 1 by calling "Post.find(1).user". This would return an object that has the user information. You can change who wrote Post.find(1) by calling for example "Post.find(1).user = User.last". How would you retrieve information of the user who wrote the last message? How would you change the owner of the last message to the first user?
# Be able to create messages written by the second user in any post
# Be able to retrieve all messages from any specific post
# Be able to retrieve all the users that "own" any specific blog

1. User.new(:first_name => "Stella", :last_name => "Gruber", :email_address => "a@example.com").save