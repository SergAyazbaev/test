<?php
//if (isset($_SESSION['number'])) $num_kill=$_SESSION['number'];
//echo ("”·ËÚÓ = $num_kill");
//print_r($_POST);
//print_r($_REQUEST);
//print_r($_SESSION);

	include('adodb/adodb.inc.php');				                                          
	
		$db = &ADONewConnection('mysql');  # create a connection
		$db->PConnect('localhost','root','','base1');
		if (!$db) print "DO'NT CONNECTION  .... !!!!! <br> ".$db->ErrorMsg()."<br>"  ;		
		if (!$db) die("Connection failed");

		//$db->debug=true;

		$text= strstr( $_POST['but_text'] ,"kill");
		//echo $text;
		//echo ('<br><br>') ;
		
		
		if( substr_count($text,'kill')>0 ) 
		{			
			//echo ('') ;		
			ereg ("[0-9][0-9]*", $text, $regs);			
			//print_r( $regs);
			
			//$regs[0];
			
			$res=$db->Execute("DELETE FROM `base1`.`tab1` WHERE `id` = '$regs[0]' ;");
			$res=$db->Execute("DELETE FROM `base1`.`tab2` WHERE `id` = '$regs[0]' ;");
			$res=$db->Execute("DELETE FROM `base1`.`tab3` WHERE `id` = '$regs[0]' ;");
			$res=$db->Execute("DELETE FROM `base1`.`tab4` WHERE `id` = '$regs[0]' ;");
		}
		

	
echo('			<div id="par2"> ');

	$x=1;			
while($x<=4)
{
			echo('			
				<div class="block2">				
				 –ó–∞–≥–æ–Ω '.$x.'
					<div id="par2">
					<select name="bar" size="10" multiple> 

				');			
				
					$tab_num=1;					
					$res=$db->Execute("SELECT * FROM `tab$x`;");

				foreach ($res as $res2) {
					echo("<option value='bar$res2[id]'>–û–≤—Ü–∞ $res2[id] ");
				}

echo('</select> </div> </div>');
 
$x=$x+1;
}				

echo('	</div> ');
				
		

?>


