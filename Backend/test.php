<?php
include 'connection.php'; 
$lat = $_GET['lat'];
$lon = $_GET['lon']; 
$sql = "SELECT   averageSpeed, traffic.id, name, X(location_data) AS x, Y(location_data) AS y FROM locations INNER JOIN traffic on locations.id=traffic.location ORDER BY traffic.id DESC";
$result = $conn->query($sql);
$locations = array();
if ($result->num_rows > 0) {
    // output data of each row
    $distance = 8000000000000.0;
    while($row = $result->fetch_assoc()) {
        
                $lat1 = $row["x"];
                $lon1 = $row["y"];
                 
                if (distance($lat, $lon, $lat1, $lon1)<$distance)
                    {
                        $distance = distance($lat, $lon, $lat1, $lon1);                       
                        $locationName = $row['name'];
                        $speed = $row['averageSpeed'];
                        $lat_curr = $lat1;
                        $lon_curr = $lon1;
                    }
            
           
        
    }
    $returnArray = array();
    array_push($returnArray,
        array("location" => $locationName,
                "speed" =>  $speed,
              "lat" => $lat_curr,
              "lon" => $lon_curr
            )
        );
    echo json_encode($returnArray);
    
} else {
    echo "Sorry data not available";
}


    function distance(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
  return $angle * $earthRadius;
}

/*function distance($lat, $lon, $lat1, $lon1) {

 

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
 $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
  return ($miles * 1.609344);
 
}

*/


    
    
$conn->close();
?>