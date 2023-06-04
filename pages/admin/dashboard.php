
                <div class="container">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>

                    <h4>Grave Data</h4>
                    <div class="row"> <!-- 1st Row -->

                        <div class="col mb-4 card text-white bg-secondary shadow">
                            <div class="row align-items-center no-gutters">
                                <div class="col">
                                    <div class="card-body">
                                            <?php
                                                $sql = mysqli_query($mysqli, "SELECT * FROM grave_data WHERE status LIKE '%occupied%'");
                                                $occupied_count = mysqli_num_rows($sql);
                                            ?>
                                        <p class="m-0"><?php echo $occupied_count; ?></p>
                                        <p class="text-white-50 small m-0">Occupied Plot</p>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-clipboard-check fa-2x mr-4"></i></div>
                            </div>
                        </div><!-- end card -->

                        <div class="col mb-4 card text-white bg-secondary shadow">
                            <div class="row align-items-center no-gutters">
                                <div class="col">
                                    <div class="card-body">
                                            <?php
                                                $sql_vacant = mysqli_query($mysqli, "SELECT COUNT(grave_no) as max_grave FROM grave_data WHERE status = 'vacant'");
                                                $vacant = mysqli_fetch_array($sql_vacant);
                                                $vacant_count = $vacant['max_grave'];
                                            ?>
                                        <p class="m-0"><?php echo $vacant_count; ?></p>
                                        <p class="text-white-50 small m-0">Vacant Plot</p>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-clipboard-check fa-2x mr-4"></i></div>
                            </div>
                        </div><!-- end card -->

                    </div> <!-- End of Row -->

                    <div class="row"> <!-- Second Row -->
                        <div class="col">
                            <h4>Death Timeline</h4>
                            <div id='chart3'></div>
                        </div>
                    </div> <!-- End of Second Row -->

                    <div class="row"> <!-- Third Row -->
                        <div class="col">
                            <h4>Age Group</h4>
                            <div id='chart1'></div>
                        </div>
                        <div class="col">
                            <h4>Gender</h4>
                            <div id='chart2'></div>
                        </div>
                    </div> <!-- End of Third Row -->


                </div>

<script>
<?php
    $sql = "SELECT COUNT(record_agegroup), record_agegroup FROM grave_record GROUP BY record_agegroup ASC";
    $result = $mysqli->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $chart1_values[] = $row['COUNT(record_agegroup)'];
        $chart1_labels[] = $row['record_agegroup'];
    }

    $sql = "SELECT COUNT(record_gender), record_gender FROM grave_record GROUP BY record_gender ASC";
    $result = $mysqli->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $chart2_y[] = $row['COUNT(record_gender)'];
        $chart2_x[] = $row['record_gender'];
    }

    $sql = "SELECT record_id, record_death FROM grave_record";
    $result = $mysqli->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $chart3_id[] = $row['record_id'];
        $chart3_death[] = $row['record_death'];
    }
?>

// Age Group
var data = [{
  values: [<?php echo implode(",", $chart1_values); ?>],
  labels: [<?php echo '"'.implode('","', $chart1_labels).'"' ?>],
  type: 'pie'
}];

var layout = {
  height: 400,
  width: 500
};

Plotly.newPlot('chart1', data, layout);


// Gender
var data = [
  {
    x: [<?php echo '"'.implode('","', $chart2_x).'"'; ?>],
    y: [<?php echo implode(",", $chart2_y); ?>],
    type: 'bar'
  }
];

var layout = {
  xaxis: {
    title: 'Gender',
  },
  yaxis: {
    title: 'Number of Records',
    showline: false,
    tickformat: ',d',
  }
}

Plotly.newPlot('chart2', data, layout);


// Date
var data = [
  {
    x: [<?php echo '"'.implode('","', $chart3_death).'"'; ?>],
    y: [<?php echo implode(",", $chart3_id); ?>],
    type: 'scatter'
  }
];

var layout = {
  xaxis: {
    title: 'Date',
    showgrid: false,
    zeroline: false
  },
  yaxis: {
    title: 'Record ID',
    showline: false,
    tickformat: ',d',
  }
}

Plotly.newPlot('chart3', data, layout);


</script>
