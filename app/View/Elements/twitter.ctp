<div class="row" style="padding-left: 100px; padding-top: 30px;">
<div class="span1"><img src="<?php echo $this->webroot; ?>img/twimg.png" /></div>
<div id="tweet" class="tweet span10" style="padding-top: 20px;">
 <p>Please wait while our latest tweet loads <img src="<?php echo $this->webroot; ?>img/indicator.gif" /></p>
 <p><a href="http://twitter.com/GetAGigUK">If you can't wait - check out what we've been twittering</a></p>
</div>
</div>
<script 
 src="<?php echo $this->webroot; ?>js/twitter.js" 
 type="text/javascript">
</script>
<script type="text/javascript" charset="utf-8">
getTwitters('tweet', { 
  id: 'GetAGigUK', 
  count: 1, 
  enableLinks: true, 
  ignoreReplies: true, 
  clearContents: true,
  template: '<blockquote><p>"%text%"</p> <a href="http://twitter.com/%user_screen_name%/statuses/%id_str%/"><small>%user_name% (%time%)</small></a></blockquote>'
});
</script>