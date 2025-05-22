<?
include('./config.php');
$feeling = $_POST['feeling'];
$fbid = $_SESSION['ses_id'];
if (isset($_POST['submit'])){
	$do_insert = mysql_query("UPDATE scgfx_user_accounts SET ranks='".$feeling."' WHERE ses_id='".$_SESSION[ses_id]."'") or die(mysql_error());
	if ($do_insert) {
		$do = mysql_query("SELECT ranks FROM scgfx_user_accounts") or die(mysql_error());
		$ranks = $do['ranks'];
		$progress='<div class="info">Success!!<br>Note: Please Click REFRESH Button to update the status.</div>';
		$getUserInfo = mysql_query("SELECT * FROM `".DB_PREFIX."user_accounts` WHERE `ses_id`='".$_SESSION['ses_id']."'");
		while($data=mysql_fetch_assoc($getUserInfo)) {
				$_SESSION['fbid'] = $data['fbid'];
				$_SESSION['name'] = $data['fbname'];
				$_SESSION['gender'] = $data['gender'];
				$_SESSION['acctype'] = $data['acctype'];
				$_SESSION['ranks'] = $data['ranks'];
				$_SESSION['points'] = $data['points'];
				$_SESSION['photo'] = $data['photo'];
			}
	}
	else {
	
		$progress='<div class="info">Failed!!</div>';
	}
}
?>
<html>
<head>
<title>One Word GFX ChatBox V1.1</title>
<style>
body {
	font-family: Arial, Verdana, Trebuchet MS;
	overflow: auto;
	overflow-x: hidden;
	-o-overflow-x: hidden;
	-moz-overflow-x: hidden;
	-webkit-overflow-x: hidden;
}

* {
	margin: 0;
	padding: 0;
}
.Box {
	background:#eeeeee;
    	width: 100%;
	height: 570px;
	padding: 5px;
	color: #4c4c4c;
	font-size: 11px;
	overflow: auto;
	overflow-x: hidden;
	-o-overflow-x: hidden;
	-moz-overflow-x: hidden;
	-webkit-overflow-x: hidden;
	
}
.trline {
	width: 99%;
    display: table;            /* this makes borders/margins work */
    border-bottom: 1px solid #dddddd;
}
.info {
	width: 300px;
	height: auto;
	background: #89f17b;
	border: 1px solid #1a730c;
	color: #0e0e0e;
	border-radius: 5px 5px 5px 5px; 
	-moz-border-radius: 5px 5px 5px 5px; 
	-webkit-border-radius: 5px 5px 5px 5px; 
	padding: 5px;
	margin: 0 auto;
}
input#name {
	box-shadow: 5px 5px 5px black;
	-moz-box-shadow: 5px 5px 5px black;
	-webkit-box-shadow: 5px 5px 5px black;
	width: 300px;
	height: 40px;
	margin: 0 auto;
}
input#submit {
	    margin: 0 auto;
	    font-family: "bebas_neueregular", "Verdana", "Tahoma";
	    font-size: 20px;
	    text-transform: uppercase;
	    border: 5px solid white; 
	    -webkit-box-shadow: 
	      inset 0 0 8px  rgba(0,0,0,0.1),
	            0 0 16px rgba(0,0,0,0.1); 
	    -moz-box-shadow: 
	      inset 0 0 8px  rgba(0,0,0,0.1),
	            0 0 16px rgba(0,0,0,0.1); 
	    box-shadow: 
	      inset 0 0 8px  rgba(0,0,0,0.1),
	            0 0 16px rgba(0,0,0,0.1); 
	    padding: 5px;
	    background: rgba(255,255,255,0.5);
	    margin: 0 0 10px 0;	
}
button#submit {
	    margin: 0 auto;
	    font-family: "bebas_neueregular", "Verdana", "Tahoma";
	    font-size: 20px;
	    text-transform: uppercase;
	    border: 5px solid white; 
	    -webkit-box-shadow: 
	      inset 0 0 8px  rgba(0,0,0,0.1),
	            0 0 16px rgba(0,0,0,0.1); 
	    -moz-box-shadow: 
	      inset 0 0 8px  rgba(0,0,0,0.1),
	            0 0 16px rgba(0,0,0,0.1); 
	    box-shadow: 
	      inset 0 0 8px  rgba(0,0,0,0.1),
	            0 0 16px rgba(0,0,0,0.1); 
	    padding: 5px;
	    background: rgba(255,255,255,0.5);
	    margin: 0 0 10px 0;
	    margin-right: 20px;	
}
span {
	width: 100%;
}
input.smile-butt {
	width: 40px;
	height: 25px;
	background: url(css/smiley.png) top no-repeat;
	background-size: 100% 100%;
	border: none;
	margin-left: 5px;
	margin-right: 4px;
	margin-top: -2px;
	cursor: pointer;
}
div.smiley-wrapperRanks {
	margin-top: 3px;
	width: 90%;
	height: auto;
	background-color: #EDEFF4;
	border-radius: 5px;
	border: 1px solid #E6E6E6;
	padding: 10px;
	box-shadow: 0 2px 3px rgba(54,54,54,1);
	-moz-box-shadow: 0 1px 3px rgba(54,54,54,1);
	-webkit-box-shadow: 0 1px 3px rgba(54,54,54,1);
	z-index: 9999;
	display: none;
}
div.smileys {
	height: 300px;
	overflow: auto;
	overflow-y: hidden;
	-ms-overflow-y: hidden;
}
div.smiley-wrapperRanks img {
	cursor: pointer;
	width: 20px;
}

div.smiley-wrapperRanks img:hover {
	opacity: 0.3;
}
::-webkit-scrollbar {
    	width: 10px;
	margin-right: 5px;
	background: white;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(5,90,170,0.3);
}
 
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 2px;
    background: #0078ff; 
    -webkit-box-shadow: inset 0 0 6px #333); 
}

::-webkit-scrollbar-thumb:window-inactive {
	background: #111111; 
}
</style>
<script type="text/javascript" src="script/jquery.min.js"></script>
<script type="text/javascript" src="script/js.js"></script>
<script type="text/javascript" src="script/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
</head>
<body>
<div class="box">
		<table style="width: 100%; font-size: 12px; color: #4c4c4c;">
			<tr class="trline">
				<td style="width: 80px;"><b>Name</b></td>
				<td style="width: 3px;">:</td>
				<td style="padding-left: 5px;"><? echo $_SESSION['name']; ?></td>
			</tr>
			<tr class="trline">
				<td style="width: 80px;"><b>Gender</b></td>
				<td style="width: 3px;">:</td>
				<td style="padding-left: 5px; text-transform: uppercase;"><? echo $_SESSION['gender']; ?></td>
			</tr>
			<tr class="trline">
				<td style="width: 80px;"><b>Chat Point(s)</b></td>
				<td style="width: 3px;">:</td>
				<td style="padding-left: 5px;"><? echo $_SESSION['points']; ?></td>
			</tr>
			<tr class="trline">
				<td style="width: 80px;"><b>Signed In:</b></td>
				<td style="width: 3px;">:</td>
				<td style="padding-left: 5px;"><? echo $_SESSION['sign_time']; ?></td>
			</tr>
		</table>
		<br/>
		<center><div class="info">
		<form action="profile.php" method="POST">
		<input type="text" name="feeling" id="name" placeholder="What`s in your mind today?" class="composer-text" maxlenght="300" required/><br><br>
				<div class="composer-buttons">
					<input type="button" value="" id="smileyRanks" title="Emotions" class="smile-butt">
					<div class="smiley-wrapperRanks">
					<div class="smileys">
					<?php if($_SESSION['acctype'] == 0 ) { ?>
						<img src="smileys/smile.gif" class="smlys" alt=":)">
						<img src="smileys/laughing.gif" class="smlys" alt=":D">
						<img src="smileys/giggle.gif" class="smlys" alt="*chuckle*">
						<img src="smileys/hi.gif" class="smlys" alt="*wave*">
						<img src="smileys/inlove.gif" class="smlys" alt="*inlove*">
						<img src="smileys/angry.gif" class="smlys" alt=":@">
						<img src="smileys/blush.gif" class="smlys" alt="*blush*">
						<img src="smileys/clapping.gif" class="smlys" alt="*clap*">
						<img src="smileys/cool.gif" class="smlys" alt="8-)">
						<img src="smileys/crying.gif" class="smlys" alt=";-(">
						<img src="smileys/kiss.gif" class="smlys" alt=":*">
						<img src="smileys/makeup.gif" class="smlys" alt="*makeup*">
						<img src="smileys/nod.gif" class="smlys" alt="*nod*">
						<img src="smileys/nospeak.gif" class="smlys" alt=":x">
						<img src="smileys/party.gif" class="smlys" alt="*party*">
						<img src="smileys/rofl.gif" class="smlys" alt="*rofl*">
						<img src="smileys/sad.gif" class="smlys" alt=":(">
						<img src="smileys/shakeno.gif" class="smlys" alt="*shake*">
						<img src="smileys/sleepy.gif" class="smlys" alt="|-)">
						<img src="smileys/sweating.gif" class="smlys" alt="*sweat*">
						<img src="smileys/thinking.gif" class="smlys" alt="*think*">
						<img src="smileys/tired.gif" class="smlys" alt="*yawn*">
						<img src="smileys/tongue_out.gif" class="smlys" alt=":p">
						<img src="smileys/wait.gif" class="smlys" alt="*wait*">
						<img src="smileys/whew.gif" class="smlys" alt="*whew*">
						<img src="smileys/wink.gif" class="smlys" alt=";)">
						<img src="smileys/wondering.gif" class="smlys" alt=":^)">
						<img src="smileys/worried.gif" class="smlys" alt=":S">
						<img src="smileys/yes.gif" class="smlys" alt="(yes)">
						<img src="smileys/no.gif" class="smlys" alt="(n)">
						<img src="smileys/bearhug.gif" class="smlys" alt="*bearhug*">
						<img src="smileys/beer.gif" class="smlys" alt="*beer*">
						<img src="smileys/brokenheart.gif" class="smlys" alt="(u)">
						<img src="smileys/dance.gif" class="smlys" alt="*dance*">
						<img src="smileys/flex.gif" class="smlys" alt="*flex*">
						<img src="smileys/flower.gif" class="smlys" alt="(f)">
						<img src="smileys/music.gif" class="smlys" alt="*music*">
						<img src="smileys/time.gif" class="smlys" alt="(o)">
						<img src="smileys/welcome.gif" class="smlys" alt="*welcome*">
					<? }if ($_SESSION['acctype'] >= 1 ) {?><img src="smileys/smile.gif" class="smlys" alt=":)">
						<img src="smileys/laughing.gif" class="smlys" alt=":D">
						<img src="smileys/giggle.gif" class="smlys" alt="*chuckle*">
						<img src="smileys/hi.gif" class="smlys" alt="*wave*">
						<img src="smileys/inlove.gif" class="smlys" alt="*inlove*">
						<img src="smileys/angry.gif" class="smlys" alt=":@">
						<img src="smileys/blush.gif" class="smlys" alt="*blush*">
						<img src="smileys/clapping.gif" class="smlys" alt="*clap*">
						<img src="smileys/cool.gif" class="smlys" alt="8-)">
						<img src="smileys/crying.gif" class="smlys" alt=";-(">
						<img src="smileys/kiss.gif" class="smlys" alt=":*">
						<img src="smileys/makeup.gif" class="smlys" alt="*makeup*">
						<img src="smileys/nod.gif" class="smlys" alt="*nod*">
						<img src="smileys/nospeak.gif" class="smlys" alt=":x">
						<img src="smileys/party.gif" class="smlys" alt="*party*">
						<img src="smileys/rofl.gif" class="smlys" alt="*rofl*">
						<img src="smileys/sad.gif" class="smlys" alt=":(">
						<img src="smileys/shakeno.gif" class="smlys" alt="*shake*">
						<img src="smileys/sleepy.gif" class="smlys" alt="|-)">
						<img src="smileys/sweating.gif" class="smlys" alt="*sweat*">
						<img src="smileys/thinking.gif" class="smlys" alt="*think*">
						<img src="smileys/tired.gif" class="smlys" alt="*yawn*">
						<img src="smileys/tongue_out.gif" class="smlys" alt=":p">
						<img src="smileys/wait.gif" class="smlys" alt="*wait*">
						<img src="smileys/whew.gif" class="smlys" alt="*whew*">
						<img src="smileys/wink.gif" class="smlys" alt=";)">
						<img src="smileys/wondering.gif" class="smlys" alt=":^)">
						<img src="smileys/worried.gif" class="smlys" alt=":S">
						<img src="smileys/yes.gif" class="smlys" alt="(yes)">
						<img src="smileys/no.gif" class="smlys" alt="(n)">
						<img src="smileys/bearhug.gif" class="smlys" alt="*bearhug*">
						<img src="smileys/beer.gif" class="smlys" alt="*beer*">
						<img src="smileys/brokenheart.gif" class="smlys" alt="(u)">
						<img src="smileys/dance.gif" class="smlys" alt="*dance1*">
						<img src="smileys/flex.gif" class="smlys" alt="*flex*">
						<img src="smileys/flower.gif" class="smlys" alt="(f)">
						<img src="smileys/music.gif" class="smlys" alt="*music*">
						<img src="smileys/time.gif" class="smlys" alt="(o)">
						<hr />
						<img src="smileys/img01.gif" class="smlys" alt="*hug*">
						<img src="smileys/img02.gif" class="smlys" alt="(y)">
						<img src="smileys/img03.gif" class="smlys" alt=":p">
						<img src="smileys/img04.gif" class="smlys" alt="*clap*">
						<img src="smileys/img05.gif" class="smlys" alt="*peace*">
						<img src="smileys/img06.gif" class="smlys" alt="*angel*">
						<img src="smileys/img07.gif" class="smlys" alt="*bleh*">
						<img src="smileys/img08.gif" class="smlys" alt="*dance*">
						<img src="smileys/img09.gif" class="smlys" alt=":)">
						<img src="smileys/img10.gif" class="smlys" alt=";(">
						<img src="smileys/img11.gif" class="smlys" alt="*inlove*">
						<img src="smileys/img12.gif" class="smlys" alt="*antok*">
						<img src="smileys/img13.gif" class="smlys" alt="*shh*">
						<img src="smileys/img14.gif" class="smlys" alt="*heartbroken*">
						<img src="smileys/img15.gif" class="smlys" alt="*bored*">
						<img src="smileys/img16.gif" class="smlys" alt="*ninja*">
						<img src="smileys/img17.gif" class="smlys" alt="^_~">
						<img src="smileys/img18.gif" class="smlys" alt="*green*">
						<img src="smileys/img19.gif" class="smlys" alt="*heart*">
						<img src="smileys/img20.gif" class="smlys" alt=":*">
						<img src="smileys/img21.gif" class="smlys" alt="*pak*">
						<img src="smileys/img22.gif" class="smlys" alt="*nyanya*">
						<img src="smileys/img24.gif" class="smlys" alt="*mwua*">
						<img src="smileys/img25.gif" class="smlys" alt="*kilig*">
						<img src="smileys/baba.jpg" class="smlys" alt="*baba*">
						<img src="smileys/emo.gif" class="smlys" alt="*emo*">
						<img src="smileys/giling_boy.gif" class="smlys" alt="*giling_boy*">
						<img src="smileys/giling_girl.gif" class="smlys" alt="*giling_girl*">
						<img src="smileys/grr.gif" class="smlys" alt="*grr*">
						<img src="smileys/gtg.gif" class="smlys" alt="*gtg*">
						<img src="smileys/huh.gif" class="smlys" alt="*huh*">
						<img src="smileys/kilig_monkey.jpg" class="smlys" alt="*kilig_monkey*">
						<img src="smileys/ayos.gif" class="smlys" alt="*ayos*">
						<img src="smileys/lmao.jpg" class="smlys" alt="*lmao*">
						<img src="smileys/maniac.gif" class="smlys" alt="*maniac*">
						<img src="smileys/nganga.gif" class="smlys" alt="*nganga*">
						<img src="smileys/nosebleed.jpg" class="smlys" alt="*nosebleed*">
						<img src="smileys/party2.gif" class="smlys" alt="*party2*">
						<img src="smileys/rap.gif" class="smlys" alt="*rap*">
						<img src="smileys/rock.gif" class="smlys" alt="*rock*">
						<img src="smileys/samba.gif" class="smlys" alt="*samba*">
						<img src="smileys/suntok.gif" class="smlys" alt="*suntok*">
						<img src="smileys/taas.jpg" class="smlys" alt="*taas*">
						<img src="smileys/tagay.gif" class="smlys" alt="*tagay*">
						<img src="smileys/tats.jpg" class="smlys" alt="*tats*">
						<img src="smileys/wahaha.gif" class="smlys" alt="*wahaha*">
						<img src="smileys/walkout.gif" class="smlys" alt="*walkout*">
						<img src="smileys/welcome.gif" class="smlys" alt="*welcome*">
						<img src="smileys/yosi.gif" class="smlys" alt="*yosi*">
					<? }?>
					</div>
					</div>
									</div>
		</div></centeR>
		<br>
		<? echo $progress; ?>
		<span>
		<center><input type="submit" name="submit" id="submit" value="enter" /></center>
		</span>
		</form>
		
</div>


</body>
</html>