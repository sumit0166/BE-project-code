<?php 
include("database_connect.php");

$ary = array();
$query = mysqli_query($conn,"select * from photos");
while ($row = mysqli_fetch_assoc($query)) {
    $ary[] = $row;
}
echo json_encode($ary);



// $table1 = 'gen1';
// $table2 = 'gen2';

// $whole = array();
// $ary = array();
// $ary1 = array();
// $ary2 = array();

// $test = mysqli_query($conn,"select * from gen_data where gen_name='".$table1."'");
// while ($row = mysqli_fetch_assoc($test)) {
//     $ary[] = $row;
// }
// array_push($whole,$ary);

// $ary =[];
// $test = mysqli_query($conn,"select * from gen_data where gen_name='".$table2."'");
// while ($row = mysqli_fetch_assoc($test)) {
//     $ary[] = $row;
// }
// array_push($whole,$ary);


// $ary =[];
// $ary1 =[];
// $ary2 =[];

// $test = mysqli_query($conn,"select * from ".$table1." group by date");
// while ($row = mysqli_fetch_assoc($test)) {
//     $ary1[] = $row;
// }
// array_push($ary,$ary1);

// $test = mysqli_query($conn,"select count(*)as days from (select * from ".$table1." group by date)dt");
// while ($row = mysqli_fetch_assoc($test)) {
    
//     array_push($ary,$row);

// }

// // array_push($ary,$ary2);

// array_push($whole,$ary);




// $ary =[];
// $ary1 =[];
// $ary2 =[];

// $test = mysqli_query($conn,"select * from ".$table2." group by date");
// while ($row = mysqli_fetch_assoc($test)) {
//     $ary1[] = $row;
// }
// array_push($ary,$ary1);

// $test = mysqli_query($conn,"select count(*)as days from (select * from ".$table2." group by date)dt");
// while ($row = mysqli_fetch_assoc($test)) {

//     array_push($ary,$row);
// }
// // array_push($ary,$ary2);

// array_push($whole,$ary);


// $ary = [];
// $all = mysqli_query($conn,"select ROUND(AVG(room_temp)) as avgTemp,
// ROUND(AVG(humidity)) as avgHumid,
// ROUND(AVG(moisture)) as avgMoist,
// ROUND(AVG(light)) as avgLight,
// ROUND(MAX(room_temp)) as maxTemp,
// ROUND(MAX(humidity)) as maxHumid,
// ROUND(MAX(moisture)) as maxMoist,
// ROUND(MAX(light)) as maxLight,
// ROUND(MIN(room_temp)) as minTemp,
// ROUND(MIN(humidity)) as minHumid,
// ROUND(MIN(moisture)) as minMoist,
// ROUND(MIN(light)) as minLight from ".$table1);
// while($row = mysqli_fetch_assoc($all)){
//     array_push($whole,$row);
// }

// $ary = [];
// $all = mysqli_query($conn,"select ROUND(AVG(room_temp)) as avgTemp,
// ROUND(AVG(humidity)) as avgHumid,
// ROUND(AVG(moisture)) as avgMoist,
// ROUND(AVG(light)) as avgLight,
// ROUND(MAX(room_temp)) as maxTemp,
// ROUND(MAX(humidity)) as maxHumid,
// ROUND(MAX(moisture)) as maxMoist,
// ROUND(MAX(light)) as maxLight,
// ROUND(MIN(room_temp)) as minTemp,
// ROUND(MIN(humidity)) as minHumid,
// ROUND(MIN(moisture)) as minMoist,
// ROUND(MIN(light)) as minLight from ".$table2);
// while($row = mysqli_fetch_assoc($all)){
//     array_push($whole,$row);
// }


// echo json_encode($whole);














// $date = new DateTime();
// echo $date->getTimestamp();
// echo date("r");
// echo date("h"); 
// echo date("H");
// $date = date("Y-m-d H:i:s");
// echo $date;
// $whole = array();
// $table = 'gen1';
// $date = date("Y-m-d");
// $whole = array();
// $ary = array();
// $test = mysqli_query($conn,"select * from gen_data where end_date is null and live_check=1 order by id desc limit 1");
// while ($row = mysqli_fetch_assoc($test)) {
//     $ary[] = $row;
//     $table = $row['gen_name'];
// }
// $test = mysqli_query($conn,"select count(*)as days from (select * from `".$table."` group by date)dt");
// while ($row = mysqli_fetch_assoc($test)) {
//     $ary[] = $row;
// }
// array_push($whole,$ary);
// $ary = [];
// $all = mysqli_query($conn,"select *  from `".$table."` order by id desc limit 1");
// if(null !== $all){
//     while($row = mysqli_fetch_assoc($all)){
//         array_push($whole,$row);
//     }
    
// }
// $ary = [];
// $all = mysqli_query($conn,"select * from (select * from `".$table."` order by id desc limit 10)Var1 order by id asc");
// while($row = mysqli_fetch_assoc($all)){
//     $ary[] = $row;
// }
// array_push($whole,$ary);

// $ary = [];
// $all = mysqli_query($conn,"select ROUND(AVG(room_temp)) as avgTemp,
// ROUND(AVG(humidity)) as avgHumid,
// ROUND(AVG(moisture)) as avgMoist,
// ROUND(AVG(light)) as avgLight,
// ROUND(MAX(room_temp)) as maxTemp,
// ROUND(MAX(humidity)) as maxHumid,
// ROUND(MAX(moisture)) as maxMoist,
// ROUND(MAX(light)) as maxLight,
// ROUND(MIN(room_temp)) as minTemp,
// ROUND(MIN(humidity)) as minHumid,
// ROUND(MIN(moisture)) as minMoist,
// ROUND(MIN(light)) as minLight from (SELECT * from `".$table."` WHERE date = '".$date."')dt");
// while($row = mysqli_fetch_assoc($all)){
//     array_push($whole,$row);
// }


// $ary = [];
// $all = mysqli_query($conn,"select
// ROUND(AVG(room_temp)) as nightTemp,
// ROUND(AVG(humidity)) as nightHumid,
// ROUND(AVG(moisture)) as nightMoist,
// ROUND(AVG(light)) as nightLight
// from `".$table."` 
// where date = '".$date."' 
// and 
// HOUR(timestamp) in (18, 19, 20, 21, 22, 23, 0, 1, 2, 3, 4, 5);");
// while($row = mysqli_fetch_assoc($all)){
//     array_push($whole,$row);
// }


// $all = mysqli_query($conn,"select
// ROUND(AVG(room_temp)) as dayTemp,
// ROUND(AVG(humidity)) as dayHumid,
// ROUND(AVG(moisture)) as dayMoist,
// ROUND(AVG(light)) as dayLight
// from `".$table."` 
// where date = '".$date."' 
// and 
// HOUR(timestamp) in (6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17);");
// while($row = mysqli_fetch_assoc($all)){
//     array_push($whole,$row);
// }


// echo json_encode($whole);



// $whole = array();
// $ary = array();
// $test = mysqli_query($conn,"select * from gen_data where end_date is null and live_check=1 order by id desc limit 1");
// while ($row = mysqli_fetch_assoc($test)) {
//     $ary[] = $row;
//     $table = $row['gen_name'];
// }
// array_push($whole,$ary);
// $test = mysqli_query($conn,"select count(*)as days from (select * from `".$table."` group by date)dt");
// while ($row = mysqli_fetch_assoc($test)) {
//     $ary[] = $row;
// }
// array_push($whole,$ary);
// $ary = [];
// $all = mysqli_query($conn,"select *  from `".$table."` order by id desc limit 1");
// if(null !== $all){
//     while($row = mysqli_fetch_assoc($all)){
//     $ary[] = $row;
//     }
//     array_push($whole,$ary);
// }
// $ary = [];
// $all = mysqli_query($conn,"select * from (select * from `".$table."` order by id desc limit 10)Var1 order by id asc");
// while($row = mysqli_fetch_assoc($all)){
//     $ary[] = $row;
// }
// array_push($whole,$ary);

// $ary = [];
// $all = mysqli_query($conn,"select ROUND(AVG(room_temp)) as avgTemp,
// ROUND(AVG(humidity)) as avgHumid,
// ROUND(AVG(moisture)) as avgMoist,
// ROUND(AVG(light)) as avgLight,
// ROUND(MAX(room_temp)) as maxTemp,
// ROUND(MAX(humidity)) as maxHumid,
// ROUND(MAX(moisture)) as maxMoist,
// ROUND(MAX(light)) as maxLight,
// ROUND(MIN(room_temp)) as minTemp,
// ROUND(MIN(humidity)) as minHumid,
// ROUND(MIN(moisture)) as minMoist,
// ROUND(MIN(light)) as minLight from (SELECT * from gen1 WHERE date = ".date("Y-m-d").")dt");
// while($row = mysqli_fetch_assoc($all)){
//     $ary[] = $row;
// }
// array_push($whole,$ary);

// $ary = [];
// $all = mysqli_query($conn,"select
// ROUND(AVG(room_temp)) as nightTemp,
// ROUND(AVG(humidity)) as nightHumid,
// ROUND(AVG(moisture)) as nightMoist,
// ROUND(AVG(light)) as nightLight
// from gen1 
// where date = ".date("Y-m-d")." 
// and 
// HOUR(timestamp) in (18, 19, 20, 21, 22, 23, 0, 1, 2, 3, 4, 5);");
// while($row = mysqli_fetch_assoc($all)){
//     $ary[] = $row;
// }
// array_push($whole,$ary);

// $all = mysqli_query($conn,"select
// ROUND(AVG(room_temp)) as dayTemp,
// ROUND(AVG(humidity)) as dayHumid,
// ROUND(AVG(moisture)) as dayMoist,
// ROUND(AVG(light)) as dayLight
// from gen1 
// where date = ".date("Y-m-d")." 
// and 
// HOUR(timestamp) in (6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17);");
// while($row = mysqli_fetch_assoc($all)){
//     $ary[] = $row;
// }
// array_push($whole,$ary);

// echo json_encode($whole);




// $query = "SELECT 
// ROUND(AVG(room_temp)) as avgTemp,
// ROUND(AVG(humidity)) as avgHumid,
// ROUND(AVG(moisture)) as avgMoist,
// ROUND(AVG(light)) as avgLight,
// ROUND(MAX(room_temp)) as maxTemp,
// ROUND(MAX(humidity)) as maxHumid,
// ROUND(MAX(moisture)) as maxMoist,
// ROUND(MAX(light)) as maxLight,
// ROUND(MIN(room_temp)) as minTemp,
// ROUND(MIN(humidity)) as minHumid,
// ROUND(MIN(moisture)) as minMoist,
// ROUND(MIN(light)) as minLight
// FROM `gen1` WHERE date BETWEEN '2021-10-04' and (SELECT date FROM `gen1` ORDER by id  DESC LIMIT 1)";
// $test = mysqli_query($conn,$query);
// if(null !== $test){
//     array_push($whole,mysqli_fetch_assoc($test));
// }

// $result = mysqli_query($conn,"select * from `".$table."` order by id DESC LIMIT 1");
// if(null !== $result){
//     array_push($whole,mysqli_fetch_assoc($result));
// }

// $ary = array();
// // $all = mysqli_query($conn,"select timestamp,room_temp,light,humidity,moisture from `".$table_name."`");
// $all = mysqli_query($conn,"select * from (select * from `".$table."` order by id desc limit 10)Var1 order by id asc");
// while($row = mysqli_fetch_assoc($all)){
// $ary[] = $row;
// }
// array_push($whole,$ary);

// $ary = array();
// $all = mysqli_query($conn,"select *  from `".$table."`");
// while($row = mysqli_fetch_assoc($all)){
// $ary[] = $row;
// }
// array_push($whole,$ary);

// echo json_encode($whole);



// $whole = array();
// 			$ary = array();
// 			$all = mysqli_query($conn,"select *  from `".$_GET['table']."`");
// 			if(null !== $all){
// 				while($row = mysqli_fetch_assoc($all)){
// 				$ary[] = $row;
// 				}
// 				array_push($whole,$ary);
// 			}
// 			// select * from gen1 where HOUR(timestamp) in (18, 19, 20, 21, 22, 23, 0, 1, 2, 3, 4, 5);
// 			$sql = "select * from `".$_GET['table']."` where HOUR(timestamp) in (6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17)";
// 			$result = mysqli_query($conn,$sql);
// 			$ary = [];
// 			if(null !== $result){
// 				while ($row =mysqli_fetch_assoc($result)) {
// 					$ary[] = $row; 
// 				}
// 				array_push($whole,$ary);
// 			}
// 			$sql2 = "select * from `".$_GET['table']."` where HOUR(timestamp) in (18, 19, 20, 21, 22, 23, 0, 1, 2, 3, 4, 5)";
// 			$result2 = mysqli_query($conn,$sql2);
// 			$ary = [];
// 			if(null !== $result2){
// 				while ($row = mysqli_fetch_assoc($result2)) {
// 					$ary[] = $row;
// 				}
// 				array_push($whole,$ary);
// 			}
// 			echo json_encode($whole);


// $whole = array();
// $test = mysqli_query($conn,"select * from gen_data where end_date is null and live_check=1 order by id desc limit 1");
// $rows_no =  mysqli_num_rows($test); 
// if($rows_no !=0 ){
//     array_push($whole,mysqli_fetch_assoc($test));
//     $test = mysqli_query($conn,"select * from gen_data where end_date is null and live_check=1 order by id desc limit 1");
//     while ($row = mysqli_fetch_assoc($test)) {
//         $table = $row['gen_name'];
//     }
// }
// else{
//     echo "nothing";
// }

// $result = mysqli_query($conn,"select * from ".$table." order by id DESC LIMIT 1");
// if(null !== $result){
//     array_push($whole,mysqli_fetch_assoc($result));
// }


// $ary = array();
// // $all = mysqli_query($conn,"select timestamp,room_temp,light,humidity,moisture from `".$table_name."`");
// $all = mysqli_query($conn,"select * from (select * from `".$table."` order by id desc limit 10)Var1 order by id asc");
// while($row = mysqli_fetch_assoc($all)){
// $ary[] = $row;
// }
// array_push($whole,$ary);


// $ary = array();
// $all = mysqli_query($conn,"select *  from `".$table."`");
// while($row = mysqli_fetch_assoc($all)){
// $ary[] = $row;
// }
// array_push($whole,$ary);


// echo json_encode($whole)

// $ary = array();
// $all = mysqli_query($conn,"select ROUND(AVG(room_temp)) as temp,ROUND(AVG(humidity)) as humid,ROUND(AVG(moisture)) as moist,ROUND(AVG(light)) as light,
//                         (select date from `".$_GET['table']."` order by id limit 1)as start,(select date from `".$_GET['table']."` order by id desc limit 1) as end  from `".$_GET['table']."`");
// while($row = mysqli_fetch_assoc($all)){
// $ary[] = $row;
// }
// echo json_encode($ary);

































// $current_timestamp_by_mktime = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
// echo $current_timestamp_by_mktime;

// $test = mysqli_query($conn,"select * from gen_data where live_check=0");
// $rows_no =  mysqli_num_rows($test); 
// $ary = array();
// while ($row = mysqli_fetch_assoc($test)) {
// 	$ary[] = $row;
// }
// if($rows_no !=0 ){
// 	echo json_encode($ary);
// }
// else{
// 	echo null;
// }

// $sql = "select image from photos where week=8";
// $test = mysqli_query($conn,$sql);
// $data = array();
// while($row = mysqli_fetch_assoc($test)){
// 	$data[] = $row['image'];
// }
// $src = $data[0]; 

// if(isset($_GET['temp'])){
// 	$sql = "insert into test(humidity,temp) values(".$_GET['humid'].",".$_GET['temp'].")";
// 	$test = mysqli_query($conn,$sql);
// }

?>
