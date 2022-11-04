<?php include('nav.php'); ?>

    <div class="container">

        <h1>Transfer Money</h1>
        
        <br>
        
        <div class="row">
            <div class="col">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-2">Id</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">Email</th>
                            <th scope="col" class="text-center py-2">Balance</th>
                            <th scope="col" class="text-center py-2">Operation</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                include('config.php');

                                $query = "SELECT * FROM `User`;";
                                $result = mysqli_query($conn, $query);

                                while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="py-2"><?php echo($rows['Id']); ?></td>
                                    <td class="py-2"><?php echo($rows['Name']); ?></td>
                                    <td class="py-2"><?php echo($rows['Email']); ?></td>
                                    <td class="py-2"><?php echo($rows['Balance']); ?></td>
                                    <td><a href="select_user_detail.php?Id=<?php echo($rows['Id']); ?>"><button type="button" class="btn btn-success">Transact</button></a></td> 
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>