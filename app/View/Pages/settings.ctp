<div class="row">
	<div class="span12">
		<div class="tabbable tabs-left">
			<div class="row">
				<div class="span3">
				  <ul class="nav nav-list">
				    <li class="active"><a href="#1" data-toggle="tab"><i class="icon-user"></i> User details</a></li>
				    <li><a href="#2" data-toggle="tab"><i class="icon-book"></i> Contact details</a></li>
				    <li><a href="#3" data-toggle="tab"><i class="icon-signal"></i> Notification settings</a></li>
				    <li><a href="#4" data-toggle="tab"><i class="icon-retweet"></i> Integration</a></li>
				    <li><a href="#5" data-toggle="tab"><i class="icon-plus"></i> Premium features</a></li>
				  </ul>
		  		</div>
		  		<div class="span9">
				  <div class="tab-content">
				    <div class="tab-pane active" id="1">
				          <?php echo $this->element('accUserDetails'); ?>
				    </div>
				    <div class="tab-pane" id="2">
				          <?php echo $this->element('accContactDetails'); ?>
				    </div>
				    <div class="tab-pane" id="3">
				          <?php echo $this->element('accNotificationsDetails'); ?>
				    </div>
				    <div class="tab-pane" id="4">
				          <?php echo $this->element('accIntegrationDetails'); ?>
				    </div>
				    <div class="tab-pane" id="5">
				          <?php echo $this->element('accPaymentDetails'); ?>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>