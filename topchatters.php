<?php
	include_once('config.php');
	
	$query = "SELECT * FROM scgfx_user_accounts WHERE acctype >= 0 ORDER BY points DESC LIMIT 10";
	$result = mysql_query($query);
	$highest = mysql_query("SELECT MIN(points) as mpoints FROM scgfx_user_accounts");
	$h2 = mysql_fetch_array($highest);
	echo mysql_error();
	
	$num = 1;
	$ranktitle = "";
	$yeah = $h2['mpoints'];
	while($topchatters=mysql_fetch_array($result)){
	
	switch($num) {
                case 1:
                $ranktitle = '&nbsp; <img src="css/img/gold-medal.png"/><img src="css/img/gold-medal.png"/><img src="css/img/gold-medal.png"/>';
                break;
                case 2:
                $ranktitle = '&nbsp; <img src="css/img/gold-medal.png"/><img src="css/img/gold-medal.png"/>';
                break;
                case 3:
                $ranktitle = '&nbsp; <img src="css/img/gold-medal.png"/>';
                break;
                default:
                $ranktitle = '';
                break;
        }
	$points = (float)$topchatters['points'];
        $fb = $topchatters['fbid'];
        $fbname = $topchatters['fbname'];
$position=30;
$fbnamelimit = substr($fbname, 0, $position); 


	echo "<div class=\"OneWordGFX-TopList\" onclick=\"window.open('http://www.facebook.com/".$fb."');return false;\">";
	echo '<img src="https://graph.facebook.com/'.$fb.'/picture" width="45px" height="35px" />';
	echo '<div class="OneWordGFX-TopInfo">';
	echo '<span class="OneWordGFX-TopName">'.$fbname.'</span><br>';
	echo 'Chat Points &raquo; <span class="OneWordGFX-TopPoints">'.$points.'</span>';
	echo '</div>';
	echo '<span class="OneWordGFX-TopRank">TOP<br>'.$num++.'</span>';
	echo '<div class="clear:both;display: inline"></div>';
	echo '</div>';
	
	}
mysql_close($con);
?>