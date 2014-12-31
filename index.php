<?php
session_start();
      include('dbconnect.php');



?>
<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>

    <style type="text/css">
        body {
            background:url('_include/img/bg1.jpg') no-repeat center center fixed;
            }
        .listspa>li{margin-bottom: 10px;
        font-size:17px;}
    </style>
    <title>Chamber of Secrets|ITRIX'15</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/icons.css" />
    <link rel="stylesheet" type="text/css" href="css/style5.css" />



    <!-- Bootstrap -->
<link href="_include/css/bootstrap.min.css" rel="stylesheet">

<!-- Main Style -->
<link href="_include/css/main2.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">

<!-- FancyBox -->
<link href="_include/css/fancybox/jquery.fancybox.css" rel="stylesheet">

<!-- Font Icons -->
<link href="_include/css/fonts.css" rel="stylesheet">

<!-- Shortcodes -->
<link href="_include/css/shortcodes.css" rel="stylesheet">

<!-- Responsive -->
<link href="_include/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="_include/css/responsive.css" rel="stylesheet">

<!-- Modernizr -->
<script src="_include/js/modernizr.js"></script>

<!-- Google Font -->
<link href="_include/css/fonts/Google Font.css" rel="stylesheet" type="text/css">

<!-- Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-38011700-1', 'techofes.org');
  ga('send', 'pageview');

</script>
<!-- End Analytics -->

    <title>Chamber of Secrets|ITRIX'15<</title>


</head>
<body style="overflow:hidden">
  <div class="container1">
      <header class="chamber-header">
            <h1>Chamber of Secrets <span> Designed for ITRIX'15 </span></h1>

  </div>
<!--<header>
    <div class="sticky-wrapper" style="height: 60px;"><div class="sticky-nav stuck" style="display: block;">
        <a id="mobile-nav" class="menu-nav" href="http://techofes.org/techofes/#menu-nav"></a>




        <nav id="menu">
            <ul id="menu-nav" class="right">
                <li><a>The Mystery of the Hidden</a></li>
            </ul>
            <ul id="menu-nav"  class="left">
                <li class=""><a id="logreg" href="#loginreg">Login/Register</a></li>
                <li><a id="logout" style="display: none;">LogOut</a></li>
                <li><a id="blank" style="width:60px;"></a></li>
                <li><a id="crownUser" style="text-transform:none;"> <?php ?></a></li>
                <div id="logo">
                    <img width="150" height="100" src="_include/img/logo12.png">
                </div>
                </ul>
    </div></div>
</header> -->
<div class="container" style="margin-left:2%; width:100% height:45%">
    <div class="span2">
        <div id="Stats" style="display: none;">
            <h3><center>Stats</center></h3>
                <div id="DealsNumber" style="position: relative; height: 280px;">
                  <ul style="position: absolute; margin: 0px; padding: 0px; top: 0px; list-style:none;">
                  <li style="margin: 0px; padding: 0px; height: 40px; width:165px">&nbsp; Points <span class="myNumber" id="points"> </span></li>
                  <li style="margin: 0px; padding: 0px; height: 40px; width:165px">&nbsp; Level <span class="myNumber" id="level"></span></li>
                  <li style="margin: 0px; padding: 0px; height: 40px; width:165px">&nbsp; Ranking <span class="myNumber" id="ranking"></span></li>
                  <li style="margin: 0px; padding: 0px; height: 40px; width:165px">&nbsp; No. of Players<br> &nbsp;&nbsp;in this level<span class="myNumber" id="levelUsers"></span></li>
                    <li style="margin: 0px; margin-top: 13px ;padding: 0px; height: 40px; width:165px">&nbsp; Total Players<span class="myNumber" id="totalPlayers"></span></li>

                  </ul>
                </div>
        </div>
    </div>
    <div id="game2" class="tabbable span8" style="margin:20px;margin-top:-3%;width:750px;display:block">
    <!--  <div class="container1">
        <nav id="bt-menu" class="bt-menu">
          <a href="#" class="bt-menu-trigger"><span>Menu</span></a>
          <ul>
            <li><a href="#game" data-toggle="tab">Game</a></li>
            <li><a href="#forum1" data-toggle="tab">Forum</a></li>
            <li><a href="#rules2" data-toggle="tab">Rules</a></li>
          </ul>

        </nav>
      </div><!-- /container -->

        <!--<ul class="nav nav-tabs">
            <li class="active">
                <a href="#game" data-toggle="tab">Game</a>
            </li>
            <li id="F1">
                <a href="#forum1" data-toggle="tab">Forum</a>
            </li>
            <li>
                <a href="#rules2" data-toggle="tab">Rules</a>
            </li>


        </ul> -->
        <div class="tab-content" style="width:95%;">
          <div class="tab-pane fade active in" id="game">
            <div  id="titlediv">
              <div><h3><center>
                </center></h3>
              </div>
            </div>
            <div  id='game3'>

            </div>
            <div id ="answerdiv" >
                <input type ="text" id="answer" style="position:relative; margin-left:15px;margin-top:3%; width:400px; background-color:rgba(0,0,0,0.2);color:#DE5E60;outline-color:#ccc;border-color:#ccc;border-shadow-color:#99f;weight:bolder;font-size:18px;"/>
                <input type ="Submit" class="answersmt" style="width:220px; "id="submitbtn"></input><!--style="position:relative;border-radius:5px;font-weight:bold; margin-left:16px;margin-top:-14px;height:31px; width:225px; background-color:rgba(0,0,0,0.2);color:#DE5E60;outline-color:#ccc;border-color:#ccc;border-shadow-color:#99f;weight:bolder;font-size:18px;"-->
          </div>
          </div>
         <div class="tab-pane fade" id="forum1" style="overflow: auto;width:100%;resize:none;height:375px;margin-left:2%;"><div style="float:right;margin-right:8%;padding-bottom:10px;" id="levelsel"></div><br>
 <div id="fbc">
                  Hello World!!!!!
 </div>



</div>
<div class="tab-pane fade" id="rules2">
	<div id="rul"  class="left">
          	<ol class="listspa">
          	<li>It is an online individual event.</li>

		<li>The event consists of a series of levels</li>

		<li>The first to finish all the levels will be winner.</li>

		<li>In case no one is able to finish all the levels, the first to reach the highest level as and when the game ends will be declared the winner.</li>

		<li>Any form of cheating is highly discouraged and anyone found indulging in such activities will be banned from continuing further.</li>

		<li>Using abusive language in the forum or revealing answers will automatically lead to disqualification.</li>

		<li>Stay Logged in to FB during the game play</li>

		<li>Click Forum button to Load the Latest comments of the level</li>

		<li>The Clues may possibly be in html comments, url of the image, refreshing the page etc.<br>
		Official clue will be given if on some conditions in the Forum </li>
</ol>

<span style="font-size:17px"><u>CONTACT:</u></span>
<br>
<span style="color:#DE5E60; font-size:17px">Prathap B &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span><span style="font-size:17px"> 7200796759</span>
<br>
<span style="color:#DE5E60; font-size:17px">Sharukh Mohamed M :</span><span style="font-size:17px"> 7200840079</span>

          </div>
</div>
      </div>

    </div>



    <div id="welcome" class="tabbable span8" style="margin:20px;margin-top:-1%;width:750px;height:60%;display:none;bottom:35px;">
      <div class="container1">
        <nav id="bt-menu" class="bt-menu">
          <a href="#welcome1" accesskey="h"></a><br>
          <a href="#rules1" accesskey="r"></a>

          <a href="#" class="bt-menu-trigger"><span>Menu</span></a>
          <ul>
            <li><a href="#welcome1" data-toggle="tab">Home</a></li>
            <li><a href="#game3" data-toggle="tab">Game</a></li>
            <li><a href="#rules1" data-toggle="tab">Rules</a></li>
            <li><a href="#faq" data-toggle="tab">FAQ</a></li>
            <li><a href="#forum1" data-toggle="tab">Forum</a></li>
            <li><a id="blank" style="height:60%;"></a></li>

            <li class=""><a id="logreg" href="#loginreg">Login/Register</a></li>
            <li><a id="logout" style="display: none;">LogOut</a></li>

          </ul>
          <ul>
            <li><a href="https://www.facebook.com/itrixceg" class="bt-icon icon-facebook">Facebook</a></li>
          </ul>
        </nav>
      </div>

      <!-- /container -->

      <!--<ul class="nav nav-tabs">
            <li class="active">
                <a href="#welcome1" data-toggle="tab">Game</a>
            </li>
            <li>
                <a href="#rules1" data-toggle="tab">Rules</a>
            </li>
            <li>
                <a href="#faq" data-toggle="tab">FAQ</a>
            </li>

        </ul> -->
        <div class="tab-content" style="width:100%;height:100%">
          <div class="tab-pane fade active in" id="welcome1">
           <div>
              <div id="wel"  style="float:left;display:inline;width:50%">
               <img src="welcome.jpg" style="width:100%;height:300px;">
          </div>
          <div id="descr"   style="float:left;display:inline;width:50%">
               <p style="margin-left:2%;margin-right:6%;margin-top:10%"> Are you among the people who like to take part and win in fun events sitting in front of your computer? Then, you have come to the right place. Welcome to the inaugural edition of the online Treasure Hunt of Techofes -<b>'The Mystery of the Hidden'</b>, where you go through a series of mazes and try your best to get ahead of others to win the mega prize.</p>
               <a href='#loginreg'  id="logreg"><center><div style="font-size:22px">PLAY NOW</div></center></a>
          </div>
          </div>
          </div>
          <div class="tab-pane fade" id="forum1">
            <div style="float:right;margin-right:8%;padding-bottom:10px;" id="levelsel">

            </div><br>
          <div id="fbc">
            Hello World!!!!!
          </div>
        </div>


          <div class="tab-pane fade" id="rules1">
          <div id="rul"  class="left">
          	<ol class='listspa'>
          	<li>It is an online individual event.</li>

		<li>The event consists of a series of levels</li>

		<li>The first to finish all the levels will be winner.</li>

		<li>In case no one is able to finish all the levels, the first to reach the highest level as and when the game ends will be declared the winner.</li>

		<li>Any form of cheating is highly discouraged and anyone found indulging in such activities will be banned from continuing further.</li>

		<li>Using abusive language in the forum or revealing answers will automatically lead to disqualification.</li>

		<li>Stay Logged in to FB during the game play</li>

		<li>Click Forum button to Load the Latest comments of the level</li>
</ol>
          </div>
</div>
<div id="faq" class="tab-pane">
	<div id="faq1" class="left">
		<ol class="listspa">
<strong>		<li><span style="color:#DE5E60;">Do I need to prepare for the event?</span><br>
		Knowing to search the web is enough. Previous experiences might come in handy but is neither a necessary nor sufficient condition.</li>

		<li><span style="color:#DE5E60;">How do you know if I cheat?</span><br>
		We do not reveal business secrets.</li>

		<li><span style="color:#DE5E60;">How long is the event?</span><br>
		Till we find the winners or a time period which we will revealed during the event - whichever is earlier.</li>

		<li><span style="color:#DE5E60;">What will the questions be about?</span><br>
		The questions can be from anything under the sun but predominantly they will be related to sports and entertainment.</li>
		<li><span style="color:#DE5E60;">Where can I find clues , if there are some?</span><br>
		They may possibly be in html comments, url of the image, refreshing the page,etc.<br>
		Official clue will be given if on some conditions in the Forum </li>
  </ol> </strong>
		<span style="font-size:17px"><u>CONTACT:</u></span>
<br>
<span style="color:#DE5E60; font-size:17px">Avinash S &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span><span style="font-size:17px"> 7598096387</span>
<br>
<span style="color:#DE5E60; font-size:17px">Sharukh Mohamed M :</span><span style="font-size:17px"> 7200840079</span>
	</div></div>
      </div>
    </div>
<?php if($_SESSION['level']==1) echo '<!-- Saeed Anwar, Virender Sehwag, Mathew Hayden, Sanath Jayasuriya -->'; ?>
    <div class="span2" id="Leaderboard"  style="position:relative; display: none;">
      <h3><center>Leaderboard</center></h3>
        <div id="Leaders" style="position: relative; height: 300px;">

        </div>
    </div>
</div>
<footer>
  Copyright © ITRIX 2015. All Rights Reserved.
</footer>
<!-- Js -->
<script src="jq.min.js"></script> <!-- jQuery Core -->
<script src="jq-ui.js"></script>
<script src="_include/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="_include/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
<script src="_include/js/waypoints.js"></script> <!-- WayPoints -->
<script src="_include/js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
<script src="_include/js/jquery.isotope.js"></script> <!-- Isotope Filter -->
<script src="_include/js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
<script src="_include/js/jquery.fancybox-media.js"></script> <!-- Fancybox for Media -->
<script src="_include/js/jquery.tweet.js"></script> <!-- Tweet -->
<script src="_include/js/main.js"></script> <!-- Default JS -->
<script src="carousel/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script src="custom.js"></script> <!-- Login/Register -->
<script src="_include/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<script src="fb.js"></script> <!-- FB Login/Register -->
<script src="ticker/jquery.simple-text-rotator.js"></script> <!-- Text Rotator -->
<script src="Leader.js"></script><!--Leaderboard-->
<!--<script type="text/javascript" src="ticker/jquery.tickertype.js"></script><-->
<!--<script src="ticker/jquery.vticker.min.js"></script>--> <!-- Updates -->
<!-- End Js -->
<?php include 'loginreg.php';?>
</body>
<script src="js/classie.js"></script>
<script src="js/borderMenu.js"></script>
</html>
