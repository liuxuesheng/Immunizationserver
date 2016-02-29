<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';

function returnRecordsList(){
$list = array();

 $sql0 = "SELECT id,immu_name,immu_times,immu_importance FROM immu_knowledge";
getRecordsHasImage($sql0,$list,'immu_knowledge');




echo json_encode($list);
}

//getNewsHasImage 负责从数据库读取带有缩略图的新闻
function getRecordsHasImage($mysql, &$list, $section){
    $conn = db_connect();
    mysqli_query($conn, "SET CHARACTER SET 'utf8';");
    $result = mysqli_query($conn, $mysql);  

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $nametring = array('item_section' => $section, 'id' => $row["id"], 'immu_name' => $row["immu_name"], 'immu_times' => $row["immu_times"], 'immu_importance' => $row["immu_importance"]);
            array_push($list, $nametring);
        }
    }
}

 echo(returnRecordsList());
?>