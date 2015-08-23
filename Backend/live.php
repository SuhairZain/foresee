<?php
                    include '../speedsense/connection.php';

                    $sql = "SELECT   averageSpeed, name FROM traffic INNER JOIN locations on locations.id=traffic.location  ORDER BY traffic.id DESC LIMIT 2";
                    $result = $conn->query($sql);
                   
                    if ($result->num_rows > 0) {
    
                        while($row = $result->fetch_assoc()) {
                            
                            $dummy = rand(10,50);
                            $speed = $row['averageSpeed'];
                            
                            if ($speed >=0 AND $speed <20)
                                {$color = "RED"; $message="[HIGH TRAFFIC]";}
                            elseif ($speed >=20 AND $speed <40)
                                {$color = "YELLOW"; $message="[MEDIUM TRAFFIC]";}
                            elseif ($speed >=40)
                                {$color = "GREEN";$message="[LOW TRAFFIC]";}

                             echo '<b>'.$row['name'].' - '.$speed.'kmph.</b><strong> <font color='.$color.' size=4pt>'.$message.'</font><strong><br>' ;
                            }
        
                        }   
                            if ($dummy >=0 AND $dummy <20)
                                {$color = "RED"; $message="[HIGH TRAFFIC]";}
                            elseif ($dummy >=20 AND $dummy <40)
                                {$color = "YELLOW"; $message="[MEDIUM TRAFFIC]";}
                            elseif ($dummy >=40)
                                {$color = "GREEN";$message="[LOW TRAFFIC]";}

                            echo '<b>Palarivattom - '.$dummy.'kmph(dummy)</b><strong> <font color='.$color.' size=4pt>'.$message.'</font><strong><br>';
                    
                    ?>