<?php
header("Content-Type:text/html;charset=utf-8");
include '../database.php';

//http://localhost/Immunizationserver/nearby/nearby.php?latitude=43.5&longitude=-79.6&distance=10

$mylatitude = isset($_GET['latitude']) ? $_GET['latitude'] : '';
$mylongitude = isset($_GET['longitude']) ? $_GET['longitude'] : '';
$mydistance = isset($_GET['distance']) ? $_GET['distance'] : '';

function returnPage1($latitude, $longitude, $distance){
	//SELECT name, address, phone, latitude, longitude, 3956 * 2 * ASIN(SQRT( POWER(SIN((43.5 - abs(clinics_hospitals.latitude)) * pi()/180 / 2),2) + COS(43.5 * pi()/180 ) * COS(abs(clinics_hospitals.latitude) * pi()/180) * POWER(SIN((79.6 - clinics_hospitals.longitude) * pi()/180 / 2), 2) )) as distance FROM clinics_hospitals having distance < 10 ORDER BY distance limit 10
	
    //title
    $sql = "SELECT name, address, phone, latitude, longitude, 3956 * 2 * ASIN(SQRT( POWER(SIN((".$latitude." - abs(clinics_hospitals.latitude)) * pi()/180 / 2),2) + COS(".$latitude." * pi()/180 ) * COS(abs(clinics_hospitals.latitude) * pi()/180) * POWER(SIN((".$longitude." - clinics_hospitals.longitude) * pi()/180 / 2), 2) )) as distance FROM clinics_hospitals having distance < ".$distance." ORDER BY distance limit 10";
	
    $conn = db_connect();
    mysqli_query($conn, "SET CHARACTER SET 'utf8';");
    $result = mysqli_query($conn, $sql);
	$list = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $locInfo = array('name' => $row["name"], 'address' => $row["address"], 'phone' => $row["phone"], 'latitude' => $row["latitude"], 'longitude' => $row["longitude"]);
            array_push($list, $locInfo);
        }
    }

	echo json_encode($list);
}
echo(returnPage1($mylatitude, $mylongitude, $mydistance))
?>
