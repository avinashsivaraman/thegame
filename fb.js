  // Additional JS functions here
 var name;
  
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '596246003782093', // App ID
      channelUrl : 'techofes.org/fb.php', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : false  // parse XFBML
    });
      
    // Additional init code here
  FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // connected
    testAPI(response.authResponse.accessToken);
   
  } else if (response.status === 'not_authorized') {
    // not_authorized
  } else {
    // not_logged_in
  }
 });

  };
 
function fblogout(){
FB.logout(function(response) {
// user is now logged out
  console.log('See you.');
  name="null";
  FB.Auth.setAuthResponse(null, 'unknown');
//    alert(name);
window.open("logout.php","_self");
});
}
function fblogin() {

    FB.login(function(response) {
        if (response.authResponse) {
            // connected
         //      alert(response.name);
            testAPI(response.authResponse.accessToken);
        } else {
            
        }
    }, {scope: 'email,user_likes,user_birthday,user_education_history,publish_stream,user_hometown,user_interests,user_location'});

}
function testAPI(token) {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) { 
       // console.log('Good to see you, ' + response.name + 'Email id is ...'+response.email+' Birthday is...'+response.birthday+'Hometown is...'+response.education);
    //name=response.name;
    var name=response.name;
    var email=response.email;
    var birthday="",hometown="";
    
    try
    {
    birthday=response.birthday;
    hometown=response.hometown.name;
    }
    catch(e){}

    $cont="<br><h2>Welcome "+name+"!</h2>";
    parent.$.fancybox.close();
    $.fancybox({
        content: $cont
    });
    $("#logreg").hide();
    $('#logout').show();
    $("#Stats").show();
    $("#game2").show();
    $("#welcome").hide();
    $("#Leaderboard").show();
    $('#crownUser').text("Welcome, "+name);
    $.post("fbregister.php",{name:name,email:email,id:response.id,token:token},function(d)
    {
	loadData();
   	loadData2();
    },'json');
    //alert('1');
    //console.log('1');
    
    });

}
  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
     ref.parentNode.insertBefore(js, ref);
   }(document));