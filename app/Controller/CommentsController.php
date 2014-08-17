<?php
class CommentsController extends AppController
{
	var $name = 'Comments';
	// get's the post Id and creates a comment with the text given from post data
	function postComment($postId)
	{
		//get the comment Text
		$commentText = $this->request->data['commentText'];
		//get the author id
		$authorId = $this->Session->read('User.id');
		// make a new comment
		if($this->Comment->save(array('text' => $commentText,
			                       'author_id' => $authorId,
			                       'post_id' => $postId)))
			$this->Session->setFlash('Comment posted successfuly');
		//refresh page
		$this->redirect($this->referer());

	}

	function delete($commentId)
	{
		// needs more checking -- refer to Posts controller delete method
		//delete comment
		$this->Comment->delete($commentId);
		//refresh page
		$this->redirect($this->referer());
	}
}
?>