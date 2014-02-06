module CommentsHelper
	def new_comment
    @comment = Comment.new
  end

  def display_comments(post_id)
    @comments = Comment.where(:post_id => post_id)
  end
end
