            <!-- Delete Record-->
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Record Form</p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php
                                $id = $_GET['id'];
                                $query = mysqli_query($mysqli, "SELECT * FROM grave_record WHERE record_id = '$id'");
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="deceased-name" class="form-label label mt-3">Name</label>
                                        <input type="text" class="form-control"  name="deceased-name" value="<?php echo $row['record_name']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-birthday" class="form-label label mt-3">Date of Birth</label>
                                        <input type="date" class="form-control" name="deceased-birthday" value="<?php echo $row['record_birth']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-deathday" class="form-label label mt-3">Date of Death</label>
                                        <input type="date" class="form-control" name="deceased-deathday" value="<?php echo $row['record_death']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-gender" class="form-label label mt-3">Gender</label>
                                        <input class="form-control" name="deceased-gender" value="<?php echo $row['record_gender']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-agegroup" class="form-label label mt-3">Age group</label>
                                        <input class="form-control" name="deceased-agegroup" value="<?php echo $row['record_agegroup']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-contactname" class="form-label label mt-3">Contact Person</label>
                                        <input type="text" class="form-control" name="deceased-contactname" value="<?php echo $row['record_contactperson']; ?>" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-contactno" class="form-label label mt-3">Contact No.</label>
                                        <input type="number" class="form-control" name="deceased-contactno" value="<?php echo $row['record_contactno']; ?>"  readonly>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label for="deceased-contactemail" class="form-label label mt-3">Email</label>
                                        <input type="email" class="form-control" name="deceased-contactemail" value="<?php echo $row['record_contactemail']; ?>" readonly>
                                    </div>
                                    <div class="col-12">
                                        <label for="grave-no" class="form-label label mt-2">Grave No.</label>
                                        <input type="number" class="form-control" name="grave-no" value="<?php echo $row['grave_id']; ?>" readonly>
                                        <p class="grave-caption text-muted"><small>Refer to the map for the grave no.</small></p>
                                    </div>
                                </div>

                            <form class="record-form" action="function/function.php?record_id=<?php echo $id; ?>&action=delete" method="POST">
                                <button class="btn btn-submit btn-secondary mt-2 float-right" name="btn-submit" value="Submit">Delete</button>
                            </form>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
