// remap jQuery to $
(function($){})(window.jQuery);


/* trigger when page is ready */
$(document).ready(function (){
	adHeight();
	konami = new Konami()
    konami.code = function() {
    		window.open('http://tinyurl.com/easteregg12', '', 'fullscreen=yes, scrollbars=auto');
    		}
    konami.load();
    
    konami1 = new Konami()
    konami1.pattern = "383838383838383838383838"
    konami1.code = function() {
    		$('div').fliptext();
    		$('span').fliptext();
    		$(':header').fliptext();
    		$('p').fliptext();
    		}
    konami1.load();
    
});

/* When the window's width changes, the ad will stay the height of
   the div before it, which is always the div that contains rows */
$(window).bind("resize", adHeight);
function adHeight( e ) {
    var winWidth = $(window).width();

	if(winWidth > 768)
	{
		$adParent = $('.ad').parent().children(":first-child");
		$adSimblingHeight = $adParent.height();
		
		/* $margin = 0;
		$adParent.children('.row').each(
		    function(){
		        $margin += parseInt($(this).children(':first-child').css('margin-top'));
		    }
		); */
	
		$adSimblingHeight -= 15;
		$('.ad').height($adSimblingHeight);
	}
	else
		$('.ad').height(auto);
}

/* optional triggers

$(window).load(function() {
	
});

$(window).resize(function() {
	
});

*/

$(function() {
  var pusher = new Pusher('e7d46a16c0337ee608f3');
  var channel = pusher.subscribe('my_notifications');
  var notifier = new PusherNotifier(channel);
});




$(document).scroll( function() {
    $('#toc').stop().animate({top:$(document).scrollTop()+'px'}, 500)
});

function ScrollTo(id){
     	$('html,body').animate({scrollTop: $("#"+id).offset().top -50}, 500);
}

function createGigRequest(gigID) {
	$.get('/Gigs/createGigRequest/' + gigID , function(data){
		data = JSON.parse(data);
		if(data['fail']==false){
			//if json returned has a data field fails with the value false do some hiding and showing of dom elements
		}else if(data['msg']=='error1'){
			//if json returned fails true and msg is error1 display the error msg1
		}else if(data['msg']=='error2'){
			//if json returned fails true and msg is error2 display the error msg2
		}
	});
}

var todaysDate = new Date();
var formatedDate =(todaysDate.getDate()) + '/' + todaysDate.getMonth() + '/' +
        todaysDate.getFullYear();

$('#looking_date').val(formatedDate);

$('#looking_date').DatePicker({
	format:'d/m/Y',
	date: $('#looking_date').val(),
	current: $('#looking_date').val(),
	starts: 1,
	position: 'r',
	onBeforeShow: function(){
		$('#looking_date').DatePickerSetDate($('#looking_date').val(), true);
	},
	onChange: function(formated, dates){
		$('#looking_date').val(formated);
		$('#looking_date').DatePickerHide();
		
	}
});