var hold = $('#container'), steps = hold.find('fieldset.step'), onStep = 0,
    prevBtn = null, nextBtn = null, numSteps = steps.length, animating=false;

function showStep(index, instant){
    if(!animating){
        animating=true;
        resizeTo = steps.eq(index).outerHeight() + 10;
        prevBtn.attr('class','hidden btn');
        nextBtn.attr('class','hidden btn');
        steps.animate({opacity:0.2}, (instant?0:250), function(){
            steps.hide().eq(index).show();
            $('#theform').animate({height: resizeTo}, (instant?0:500), function(){
                steps.animate({opacity:1}, (instant?0:250));
                prevBtn.attr('class',(index==0?'hidden btn':'shown btn'));
                nextBtn.attr('class',(index==numSteps-1?'hidden btn':'shown btn pull-right'));
                $('#submitter').attr('class',(index==numSteps-1?'show btn-danger pull-right':'hidden btn-danger pull-right'));
                stepNav.attr('class','btn disabled').eq(index).addClass('on  btn-danger disabled');
                onStep = index;
                animating=false;
          });
        });
    }
}

// Add direct step navigation
hold.prepend('<br />');
hold.prepend('<div class="row"><div class="span6 offset3" ><div class="btn-group"><ul id="stepsNav">');                    
steps.each(function(index, el){
    $('#stepsNav').append('<li class="btn disabled" data-step="' + index + '">' +
    $(el).data('stepname') +'</li>');
});
stepNav = $('#stepsNav li');
//stepNav.click(function(){
//    if(onStep!=$(this).data('step')){
//        showStep($(this).data('step'), false);
//    }
//});
    
$('<div id="btns"></div>').appendTo(hold);
prevBtn = $('<a class="btn" id="prevBtn">&laquo; Previous step</a>').appendTo('#btns');
nextBtn = $('<a class="btn" id="nextBtn">Next step &raquo;</a>').appendTo('#btns');

$('#submitter').parent().remove().end().remove().appendTo('#btns').click(function(){
  $('#theform').submit();   
});

// Add next and previous step navigation
prevBtn.click(function(){
    if(onStep!=0){
        showStep(onStep-1, false)                
    }
});
nextBtn.click(function(){
    if(onStep!=numSteps-1){
        showStep(onStep+1, false)                
    }
});
    
$('#theform').css({'height':'0','overflow':'hidden'});
                         
// Do this thang                         
showStep(0, true);