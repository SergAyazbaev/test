<?php
///session_start();
//<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js">

?>

<script type="text/javascript" src="ajax/jquery-1.5.1.min.js">
</script>
<script type="text/javascript">   
$(document).ready(function(){

   $("#but1").click(function(){
      $("#par2").load("from_db_rest.php");
   })

   $("#but2").click(function(){
      $("#par2").load("from_db_clear.php");
   })

   $("#but33").click(function(){
      //$("#par3").load("from_db_kill.php","x=10&y=100");		
      $("#par3").load("from_db_kill.php","but_text:#but_text");		
   })
        
            $('#myForm').submit(function(){  
                $.ajax({  
                    type: "POST",  
                    url: "from_db_kill.php",  
                    data: "but_text="+$("#but_text").val(),
                    success: function(html){  
                        $("#par3").html(html);  
                    }  
                });  
                return false;  
            });  
              
        });  
</script> 

 <style type="text/css">
   form { 
    width: 800px;
	height:400px;
    background: #ccc;
    padding: 5px;
    padding-right: 20px; 
    border: solid 1px black; 
    float: auto;
	margin-left: auto;
    margin-right: auto
   }
   form .block1 { 
    width: 22%; 
	height:250px;
    background: #fc9; 
    padding: 5px; 
    border: solid 1px black;     
	float: right;
   }
   form .block2 { 
    width: 22%; 
	height:250px;
    background: #fc9; 
    padding: 5px; 
    border: solid 1px black;     
	float:  right ;
   }
   form .block3 { 
    width: 90%; 
	height:50px;
    background: #fc9; 
    padding: 5px; 
    border: solid 1px black; 
    float: left; 
   }
   form .block33 { 
    width: 100%; 
	height:10px;
    background: #ccc;
    padding: 5px;     
    float: left; 
   }
  select {
    width: 70%; 
   }
   form .search {
    width: 50%; 
   }
   form .new {
    width: 25%; 
	float: left; 
	height:30px;
   }
   form .kill {
    width: 25%; 
	float: right; 
	height:30px;
   }

   form .formSubmit {
	margin-left: 85px;
	cursor: pointer;
	width: auto;
	}
	
	
	form input[type=checkbox] {
	border: none;
	}
  </style> 
  
<body>
  
<table width=100% height=100%>
<tr><td align=center>

			<div class="block1">
			<form  id="myForm">
<?

    //position: relative; 
	

	include('adodb/adodb.inc.php');				                                          
	$db = &ADONewConnection('mysql');  # create a connection
		//$db->PConnect('localhost','root','','base1');
		if (!$db) print "DO'NT CONNECTION  .... !!!!! <br> ".$db->ErrorMsg()."<br>"  ;		
		if (!$db) die("Connection failed");
return;
		
		
	//	$db->charSet='win1251';		
		$db->charSet='utf8';				                                          
	/// $db->charSet='cp1251';				                                          
	//	$db->charSet='koi8r';				                                          
	//$_POST['connect']=$db;
			if($res<0) echo('Что-то пошло не так');
			else print ("<font color=red size=6> Учет Овец </font><br>");

			$res=$db->Execute("TRUNCATE TABLE tab1;"); 
			$res=$db->Execute("TRUNCATE TABLE tab2;"); 
			$res=$db->Execute("TRUNCATE TABLE tab3;"); 
			$res=$db->Execute("TRUNCATE TABLE tab4;"); 

			$mass[1]="Bee1";	$mass[2]="Bee2";	$mass[3]="Bee3";	$mass[4]="Bee4";	$mass[5]="Bee5";
			$mass[6]="Bee6";	$mass[7]="Bee7";	$mass[8]="Bee8";	$mass[9]="Bee9";	$mass[10]="Bee10";

if (isset($_COOKIE['number']))			
			
			$x=$_COOKIE['number']; 
			$x=1;
			$tab_num=1;
			while($x<=$owner+10)
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
				echo("<option value='bar$res2[id]'>Овечка $res2[id] ");
				}

echo('</select> </div> </div>');
 
$x=$x+1;
}				

echo('	</div> ');
				
echo('
	<div class="block33"></div>	
	
	<input id="but1" type="button" value=" Обновить " class="new">	 
	<input id="but2" type="button" value=" Зарубить всех овечек " class="kill">

	<div class="block33"></div>	
	
	<input id="but_text" type="text" class="search" > 
	<input id="but3" type="submit" value=" Выполнить команду " class="kill">
	
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


