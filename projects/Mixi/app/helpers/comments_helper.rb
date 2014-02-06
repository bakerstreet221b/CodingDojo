module CommentsHelper
	def new_comment
    @comment = Comment.new
  end

  def display_comments(post_id)
    @comments = Comment.where(:post_id => post_id)
  end

  def display_last_two(post_id)
    @display_last_two = Comment.where(:post_id => post_id).last(2)
  end
end
