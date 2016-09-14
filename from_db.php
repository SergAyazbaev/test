<?php
// Start the session
//ini_set("session.gc_maxlifetime",10800) ; // 3 times
  //$lifetime=600;
  //session_set_cookie_params($lifetime);
session_start();

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

if (isset($_COOKIE['number']))			
			
			$x=$_COOKIE['number']; ///из сеанса
			$tab_num=1;
			while($x<=$owner+10)
			{
				// Заполняем четыре таблицы в случайном порядке
				$tab_num=rand(1, 4);
				$res=$db->Execute("INSERT INTO `base1`.`tab$tab_num` (`id` ,`name`) VALUES ('$x', '$mass[$x]');");
				//$str1=convert_cyr_string($str1,"k","w");
				 
				$x=$x+1;
			}

//setcookie("number", "dfgdgf");

$_SESSION['number']=$x;
//echo ("x =$x" );
//print_r($_ENV);
//print_r($_SERVER);

	$x=1;			
while($x<=4)
{
			echo('			
				<div class="block2">				
				<br> Загон '.$x.'<br> 
				<select name="bar" size="10" multiple> '
				);			
				
					$tab_num=1;
					//			$res=$db->Execute("SELECT `base1`.`tab$tab_num` (`id` ,`name`);");				
					$res=$db->Execute("SELECT * FROM `tab$x`;");

				foreach ($res as $res2) {
				//echo "<b>$value</b><br>";
				echo("<option value='bar$res2[id]'>Овечка $res2[id] ");
				}

echo('</select> </div>');
  
$x=$x+1;
}				
				
echo('
	<div class="block33"></div>	
	
	<input id="but1" type="button" value=" Обновить " class="new">	 
	<input id="but2" type="button" value=" Зарубить всех овечек " class="kill">

	<div class="block33"></div>	
	
	<input type="text" class="search" class="new"> 
	<input type="button" value=" Выполнить " class="kill">
	
	</form> </div>');

//<input type=submit value="GO!">
?>

</div>

</td></tr>
</table>

</body></html>


