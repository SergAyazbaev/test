<? header("Content-type: text/html; charset=windows-1251");      
//    header("Cache-Control: no-store, no-cache, must-revalidate");
//    header("Cache-Control: post-check=0, pre-check=0", false);
session_start();
?>

<html><body>

 <style type="text/css">
   form block1{ 
    width: 50%;
    background: #ccc;
    padding: 5px;
    padding-right: 20px; 
    border: solid 1px black; 
    float: auto;
   }
   form .block2 { 
    width: 20%; 
	height:250px;
    background: #fc9; 
    padding: 5px; 
    border: solid 1px black; 
    float: left; 
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
  
  <script type="text/javascript">   
$(document).ready(function(){

   $("#forma1").focus(function(){ 
      $(this).attr("value","");
      $(this).css("color","black");
   });
   $("#select").blur(function(){ 
      $(this).attr("value","Введите ФИО");
      $(this).css("color","grey");
   });
   $("#el2").change(function(){ alert("Содержимое данного элемента было изменено.") });

});                                           
</script>    
  
<table width=100% height=100%>
<tr><td align=center>

			<div class="form block1">
<?

    //position: relative; 
	
if (isset($_SESSION['number']))  $owner = $_SESSION['number'];    // номер автора   


	include('adodb/adodb.inc.php');				                                          
	$db = &ADONewConnection('mysql');  # create a connection
		$db->PConnect('localhost','root','','base1');
		if (!$db) print "DO'NT CONNECTION  .... !!!!! <br> ".$db->ErrorMsg()."<br>"  ;		
		if (!$db) die("Connection failed");

		$db->charSet='win1251';		
	//	$db->charSet='utf8';				                                          
		///$db->charSet='cp1251';				                                          
	//	$db->charSet='koi8r';				                                          
	//$_POST['connect']=$db;
			if($res<0) echo('Что-то не так в записи');
			else print ("<font color=red> Продолжайте ! </font><br>");

			$res=$db->Execute("TRUNCATE TABLE tab1;"); //Очистить таблицу
			$res=$db->Execute("TRUNCATE TABLE tab2;"); //Очистить таблицу
			$res=$db->Execute("TRUNCATE TABLE tab3;"); //Очистить таблицу
			$res=$db->Execute("TRUNCATE TABLE tab4;"); //Очистить таблицу

			$mass[1]="Bee1";	$mass[2]="Bee2";	$mass[3]="Bee3";	$mass[4]="Bee4";	$mass[5]="Bee5";
			$mass[6]="Bee6";	$mass[7]="Bee7";	$mass[8]="Bee8";	$mass[9]="Bee9";	$mass[10]="Bee10";
			//print_r( $mass);
			
			$x=$owner; ///из сеанса
			$tab_num=1;
			while($x<=$owner+10)
			{
				// Заполняем четыре таблицы в случайном порядке
				$tab_num=rand(1, 4);
				$res=$db->Execute("INSERT INTO `base1`.`tab$tab_num` (`id` ,`name`) VALUES ('$x', '$mass[$x]');");
				//$str1=convert_cyr_string($str1,"k","w");
				 
				$x=$x+1;
			}

$_SESSION['number']=$x;
	$x=1;			
while($x<=4)
{
			echo('
			<form name="forma1"> 
				<div class="block2">				
				<br> Загон '.$x.'<br> 
				<select name="bar" size="10" multiple> '
				);			
				
			$tab_num=1;
			//			$res=$db->Execute("SELECT `base1`.`tab$tab_num` (`id` ,`name`);");				
			$res=$db->Execute("SELECT * FROM `tab$x`;");
			if($res==0) echo("<option value='bar1'>Пусто в загоне");
			else	foreach ($res as $res2) {
				//echo "<b>$value</b><br>";
				echo("<option value='bar$res2[id]'>Овечка $res2[id] ");
				}

echo('</select> </div> </form> </div>');
$x=$x+1;
}				
				
					
?>

<style type="text/css">
#square
{
border:1px solid;
width:100%;
height:250px;
font-size:30px;
padding-left:30px;
padding-top:100px;
float:left;
margin-right:15px;
}
#coord
{
font-size:1.2em;
text-align:center;
}
</style>   

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">   
$(document).ready(function(){
  
   $("#square").click(function(event){
      $("#coord").css("display","block");
      $("#x").html(event.pageX);
      $("#y").html(event.pageY);
   });

});                                           
</script> 
</head>
<body>
<div id="square">Щелкните где-нибудь в данном поле.</div>
<div id="coord" >Курсор мышоординатах:<br /><br /> <b>X:<span id="x"></span> Y:<span id="y"> </span></b> </div>
</body>

</div>

</td></tr>
</table>

</body></html>


