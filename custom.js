$("#logreg").fancybox({
    'titleShow'     : false,
    'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic',
    'easingIn'      : 'easeOutBack',
    'easingOut'     : 'easeInBack' 
});
$('#pro').fancybox({
    'titleShow'     : false,
    'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic',
    'easingIn'      : 'easeOutBack',
    'easingOut'     : 'easeInBack' 
});
$("#about").fancybox({
    'titleShow'     : false,
    'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic',
    'easingIn'      : 'easeOutBack',
    'easingOut'     : 'easeInBack' 
});
function runIt4() {
$('#sponsors1').effect( "fade",{times:3}, 1000 );
$('#updates').effect( "fade",{times:3}, 1000 );
//$('#example').vTicker();
}
function runIt2() {
$('#mainlogo').effect( "fade",{times:3}, 500 );
//$('#logo').effect( "bounce",{times:3}, 500 );
setTimeout(runIt3, 2500);
}
function runIt1() {
$('#ticker-area').effect( "fade",{times:3}, 1000 );
setTimeout(runIt2, 1500);
}
function runIt3() {
$('.sticky-nav').effect( "bounce",{times:3}, 500 );
setTimeout(runIt4, 1500);
}
$(document).ready(function($)
{
    var flag=1;
    $("#logout").hide();
    $("#supersized").hide();
    $("#home-slider").hide();
    $('.sticky-nav').hide();
    $('#sponsors1').hide();
    $('#mainlogo').hide();
    $('#updates').hide();
    $('#loading').hide();
    $('#ticker-area').hide();
    $('#this-carousel-id').carousel({
      interval: 2500
    });
    $('#slider').nivoSlider({
    effect: 'random',               // Specify sets like: 'fold,fade,sliceDown'
    slices: 15,                     // For slice animations
    boxCols: 8,                     // For box animations
    boxRows: 4,                     // For box animations
    animSpeed: 2000,                 // Slide transition speed
    pauseTime: 3000,                // How long each slide will show
    startSlide: 0,                  // Set starting Slide (0 index)
    directionNav: false,             // Next & Prev navigation
    controlNav: false,               // 1,2,3... navigation
    controlNavThumbs: false,        // Use thumbnails for Control Nav
    pauseOnHover: true,             // Stop animation while hovering
    manualAdvance: false,           // Force manual transitions
    prevText: 'Prev',               // Prev directionNav text
    nextText: 'Next',               // Next directionNav text
    randomStart: false,             // Start on a random slide
    beforeChange: function(){},     // Triggers before a slide transition
    afterChange: function(){},      // Triggers after a slide transition
    slideshowEnd: function(){},     // Triggers after all slides have been shown
    lastSlide: function(){},        // Triggers when last slide is shown
    afterLoad: function(){}         // Triggers when slider has loaded
    });
    
    
    $.post("checksession.php",{},function(reply)
    {
        if(reply.codex==20)
        {
            
            $("#logreg").hide();
                $("#Stats").show();
                $("#game").show();
                $("#welcome").hide();
                $("#Leaderboard").show();
                 $('#crownUser').text("Welcome, "+reply.namex);
                  $("#logout").show();
        }
        if(reply.codex==10)
            {
       

                $("#logreg").show();
                $("#Stats").hide();
                $("#game2").hide();
                $("#Leaderboard").hide();
                $("#welcome").show();

            }
    },'json');


$('#answer').keypress(function(e){
if(e.which == 13) {
//call your code
$("#submitbtn").trigger("click");

 }
});
    
    $(".rotate").textrotator({
      animation: "spin", // Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
      separator: ",", // If you don't want commas to be the separator, you can define a new separator (|, &, * etc.) by yourself using this field.
      speed: 2000 // How many milliseconds until the next word show.
    });
    
     $('#submitbtn').click(function(e)
    {
        e.preventDefault();
        var answer=$('#answer').val().trim();
       
           $.post("checkanswer.php",{answer:answer},function (datax)
        {
                
                
              
            if(datax.codex=="10")
            {
                $.fancybox({
                    
                    content :"<div style='width:300px;height:296px'><img src='_include/img/right.jpg'/></div>"
                    
                });

                loadData();
                loadData2();

            }
            else if(datax.codex=="20")
            {
                $.fancybox({
                    content:"<div style='width:300px;height:226px'><img src='_include/img/Wrong.png' height='100%'/></div>"
                });
            }
           $('#answer').val('');
        },"json");
        
    });
    $('#logreg').click(function(e)
    {
        $("#error0").hide();
        $("#error1").hide();
        $("#error2").hide();
        $("#error3").hide();
        $("input#email,input#pass,input#regemail,input#regpass,input#name,input#phone").val("");
    });
    $('#logout').click(function(e)
    {
        $cont="<br><h2>Logged Out!</h2>";
        var flag=2;
        $.post("logout.php",{flag:flag},function(data)
        {
            if(data==1)
            {
                fblogout();
            }
            $.fancybox({
                    content: $cont
            });
            $("#logreg").show();
            $("#logout").hide();
            $("#Stats").hide();
            $("#game2").hide();
            $("#Leaderboard").hide();
            $("#welcome").show();
            $('#crownUser').text("");
           
        });
        
    });
    $('#F1').click(function(e)
    {
        loadData3();
        $('#fbc').load('CommentLoader.php',function(){
        try{
        FB.XFBML.parse(); 
        }
        catch(ex){}
       });
	
        
    });
    
    $('#fblogin').click(function(e)
    {
        fblogin();
    });
    $('.left').click(function(e)
    {
        $('.left li').removeClass('current');
    });
    $('.event').click(function(e)
    {
        $('#loading').show();
        var eid = $(this).attr('id');
         $.post("events/content.php",{eid:eid},function(data)
            {
                $cont=data;
                $('#loading').hide();
                $.fancybox({
                    content: $cont
                });
            });
    });
    loadData();
    loadData2();

});