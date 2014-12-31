<?php 
session_start();
echo '<html xmlns:fb="http://ogp.me/ns/fb#"><body>';
echo '<fb:comments href="http://techofes.org/thegame/comment/comment'.$_SESSION['level'].'" width="650" numposts="3" colorscheme="dark"></fb:comments></body></body>'; ?>