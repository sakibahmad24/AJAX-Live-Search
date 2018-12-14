<?php

require_once ('connection.php');
 
if(isset($_REQUEST["term"])){
    
    $sql = "SELECT * FROM countries WHERE name LIKE ?";
    
    if($stmt = $mysqli->prepare($sql)){
        
        $stmt->bind_param("s", $param_term);
        
        
        $param_term = $_REQUEST["term"] . '%';
        
        
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            if($result->num_rows > 0){
                
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    echo "<p>" . $row["name"] . "</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    
    $stmt->close();
}
 
$mysqli->close();
?>