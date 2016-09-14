<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=win-1251">

  <link rel="stylesheet" type="text/css" href="mystyle.css">
  
  <script type="text/javascript" src="ajax/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript">   
$(document).ready(function(){

   $("#but1").click(function(){
      $("#par2").load("from_db_add.php");
   })
   $("#but2").click(function(){
      $("#par2").load("from_db_clear.php");
   })



   $("#but11").click(function(){
      $("#par2").load("from_db_rest.php");
   })

   $("#but3555").click(function(){
      $("#par2").load("from_db_reload.php","but_text="+$("#but_text").val());		
   })
        
            $('#myForm').submit(function(){  
                $.ajax({  
                    type: "POST",  
                    url: "from_db_kill.php",  
                    data: "but_text="+$("#but_text").val(),
                    success: function(html){  
                        $("#par2").html(html);  
                    }  
                });  
                return false;  
            });  
              
        });  
</script> 

</head>
  
<body>
  
<table width=100% height=100%>
<tr><td align=center>

			<div class="block1">
			<form  id="myForm">
<?php
if (!isset($_SESSION['number'])) $_SESSION['number']=1;

/*
DROP TABLE IF EXISTS `tab1`;

CREATE TABLE IF NOT EXISTS `tab1` (
  `id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/

//mb_internal_encoding("UTF-8");


	include('/adodb/adodb.inc.php');				                                          
	$db = &ADONewConnection('mysql');  # create a connection
		$db->PConnect('localhost','root','','base1');
		if (!$db) print "DO'NT CONNECTION  .... !!!!! <br> ".$db->ErrorMsg()."<br>"  ;		
		if (!$db) die("Connection failed");
		$db->charSet='utf8';				                                          
	
			$res=$db->Execute("TRUNCATE TABLE tab1;"); 
			$res=$db->Execute("TRUNCATE TABLE tab2;"); 
			$res=$db->Execute("TRUNCATE TABLE tab3;"); 
			$res=$db->Execute("TRUNCATE TABLE tab4;"); 

			print ("<font color=red size=6>Пастбище</font><br>");
			
	
	
			$mass[1]="Овца1";	
			$mass[2]="Овца2";	
			$mass[3]="Овца3";	
			$mass[4]="Овца4";	
			$mass[5]="Овца5";	
			$mass[6]="Овца6";	
			$mass[7]="Овца7";	
			$mass[8]="Овца8";	
			$mass[9]="Овца9";	
			$mass[10]="Овца10";	
			
if (isset($_COOKIE['number']))			
			
			$x=$_COOKIE['number']; 
			$x=1;
			$tab_num=1;
			while($x<=10)
			{
			
				$tab_num=rand(1, 4);
				$res=$db->Execute("INSERT INTO `base1`.`tab$tab_num` (`id` ,`name`) VALUES ('$x', '$mass[$x]');");
				//$str1=convert_cyr_string($str1,"k","w");
				 
				$x=$x+1;
			}


echo('			<div id="par2"> ');

	$x=1;			
while($x<=4)
{
			echo('			
				<div class="block2">				
				Загон '.$x.'
					<div id="par2">
					<select name="bar" size="10" multiple> 

				');			
				
					$tab_num=1;
					//			$res=$db->Execute("SELECT `base1`.`tab$tab_num` (`id` ,`name`);");				
					$res=$db->Execute("SELECT * FROM `tab$x`;");

				foreach ($res as $res2) {
				//echo "<b>$value</b><br>";
				echo("<option value='bar$res2[id]'>$res2[name] ");
				}

echo('</select> </div> </div>');
 
$x=$x+1;
}				

echo('	</div> ');

// 	<input id="but11" type="button" value=" кто " class="new">	 
				
echo('
	<div class="block33"></div>	
	
	<input id="but1" type="button" value=" Добавить " class="new">	 
	<input id="but2" type="button" value=" Удалить всех " class="kill">

	<div class="block33"></div>	
	
	<br><br>
	<input id="but_text" type="text" class="search " > 
	<input id="but3" type="submit" value="  Выполнить команду " class="kill">
	( kill1: kill baran1 )
	
	</form> ');
	
echo('	<div id="par3"> ');
echo('	</div> ');

//<input type=submit value="GO!">
?>

</div>
</div>

</td></tr>
</table>

</body></html>


