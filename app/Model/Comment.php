<?php
class Comment extends AppModel
{
	var $name = 'Comments';
	var $primaryKey = 'comment_id';

	public $belongsTo = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'author_id'
        )
    );
}