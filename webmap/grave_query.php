<?php
    // Only allow GET requests with "grave_id" parameter
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["grave_name"])) {
        include_once("../include/config.php");

        $query_result = array();
        //echo "<script>alert('SELECT * FROM grave_data WHERE label=\"" . $_GET["grave_name"] . "\"');</script>";
    
        // Get data from grave_data
        //$query_grave_data = "SELECT * FROM grave_data WHERE label = \"" . $_GET["grave_name"] . "\"";
        $query_grave_data = "SELECT * FROM grave_data WHERE label = 'A-1000 AD-1'";
        //echo "<script>console.log($query_grave_data);</script>";
        $result_data = mysqli_query($mysqli, $query_grave_data);
         
        // if no data found, return 404
        if(mysqli_num_rows($result_data) == 0) {
            header("HTTP/1.0 404 Not Found", true, 404);
            exit();
        } 
        
        $data = $result_data->fetch_assoc();
        
        $id = $data["id"];
        $query_result["SiteName"] = $data["label"];
        $query_result["LotAvail"] = $data["LotAvail"];

        // Leave Name, DoB, and DoD empty for now
        $query_result["Name"] = "";
        $query_result["DoB"] = "";
        $query_result["DoD"] = "";

        // check if grave_data['status'] is not vacant - if it is, then get data from grave_records
        $query_grave_record = "SELECT * FROM grave_record WHERE grave_id = " . $id;
        $result_record = mysqli_query($mysqli, $query_grave_record);

        if(mysqli_num_rows($result_record) != 0) {
            $record = $result_record->fetch_assoc();
            $query_result["Name"] = $record["record_name"];
            $query_result["DoB"] = $record["record_birth"];
            $query_result["DoD"] = $record["record_death"];
        }

        // Return JSON (or... echo)
        echo json_encode($query_result);

    } else {
        // Disable direct access - redirect to root
        header("Location: /");
        exit();
    }
    
?>