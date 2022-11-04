<?php include('nav.php'); ?>

	<div class="container">
        <h1>Transaction History</h1>
        
        <br>
        
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date & Time</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        include('config.php');

                        $query = "SELECT * FROM `Transaction`;";
                        $result = mysqli_query($conn, $query);

                        while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                        <td class="py-2"><?php echo($rows['Id']); ?></td>
                        <td class="py-2"><?php echo($rows['Sender']); ?></td>
                        <td class="py-2"><?php echo($rows['Receiver']); ?></td>
                        <td class="py-2"><?php echo($rows['Balance']); ?></td>
                        <td class="py-2"><?php echo($rows['Datetime']); ?></td> 
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include('footer.php'); ?>