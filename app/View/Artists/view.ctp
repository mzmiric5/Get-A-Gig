<?php $this->set('title_for_layout', 'Artist | '.$artistDetails['name']) ?>
<div class="row">
	<div class="span2">
		<?php $this->set('profileId', $artistDetails['user_id']); ?>
		<div class="profilePicture"><img src="<?php echo $artistDetails['profile_picture'] ?>" /></div>
		<div class="profileMenu">
			<ul class="nav nav-list">
				<li class="active"><a><i class="icon-comment icon-white"></i> Wall</a></li>
				<li><a><i class="icon-align-justify"></i> Info</a></li>
				<li><a><i class="icon-random"></i> Connections</a></li> <!-- The section here will have to be fully ajaxed with the rest of the content we need to discus how this will actually be implemented -->
				<li><a><i class="icon-picture"></i> Pics</a></li>
				<li><a><i class="icon-headphones"></i> Music</a></li>
			    <li class="divider"></li>
			    <li class="nav-header"><i class="icon-random"></i> Connections (235)</li>
				<li>Connection 1</li>
				<li>Connection 2</li>
				<li>Connection 3</li>
				<li>Connection 4</li>
				<li>Connection 5</li>
				<li>Connection 6</li>
				<li>Connection 7</li>
				<li>Connection 8</li>
				<li>Connection 9</li>
				<li>Connection 10</li>
			</ul>
		</div>
		<br />
		<div class="report">
			<a href=""><i class="icon-ban-circle"></i> Report this account</a>
		</div>
	</div>
	<div class="span10">
		<div class="profileName" style="float: left;">
		<h3><?php echo $artistDetails['name']; ?></h3>
		</div>
		<div class="buttons" style="float: right;">
			<?php if($artistDetails['user_id'] == $this->Session->read('User.id')) 
		      {
		      	echo "That's you";
		      }
		      elseif (!$areConnected)
		      {
		      	echo '<a href="'.$this->webroot.'Connections/requestConnection/'.$artistDetails["user_id"].'"class="btn">Connect</a>'; 
		      }	
		      
		      ?>
			<a href="" class="btn">Message</a>
		</div>
		<div class="clearfix"></div>
		<div class="profileInfo">
			<span><small>1 Location : <?php echo $artistDetails['location'] ?> 2 Popularity/rating 3 Genre</small></span>
		</div>
		<div class="profileTopGigs"></div>
		<div class="clearfix"></div>
			<?php if($areConnected) echo $this->element('connectionActions'); ?>
		<div class="clearfix"></div>
		<div class="wall">
			<?php echo $this->element('post'); ?>
		</div>
	</div>
</div>
<br />