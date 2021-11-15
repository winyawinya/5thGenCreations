<div class="container-fluid-px-4">
    <h1 class="mt-4">5thGen Creations</h1>
    <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li> 
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Registered User </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row["id"]; ?> </td>
                                        <td><?= $row["fname"]; ?> </td>
                                        <td><?= $row["lname"]; ?> </td>
                                        <td><?= $row["email"]; ?> </td>
                                        <td><a href="edit-register.php"  class="btn btn-lg btn-secondary my-3">Edit</a></td>
                                        <td><button type=""  class="btn btn-lg btn-secondary my-3">Delete</button></td>
                                    </tr>
                                    <?php
                                    }
                                }
                                else
                                {
                                ?>   
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                <?php
                                }
                                ?>
                                
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>