<?php
    include('config.php');

    if (isset($_POST['submit'])) {

        $from = $_GET['Id'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        $query = "SELECT * FROM `User` WHERE `Id` = $from;";
        $result = mysqli_query($conn, $query);
        $from_user = mysqli_fetch_array($result);

        $query = "SELECT * FROM `User` WHERE `Id` = $to;";
        $result = mysqli_query($conn, $query);
        $to_user = mysqli_fetch_array($result);

        if ($amount < 0) {
            echo("<script type='text/javascript'>");
            echo("alert('Oops! Negative values cannot be transferred')");
            echo("</script>");
        } else if ($amount > $from_user['Balance']) {
            echo("<script type='text/javascript'>");
            echo("alert('Bad Luck! Insufficient Balance')");
            echo("</script>");
        } else if ($amount == 0) {
            echo("<script type='text/javascript'>");
            echo("alert('Oops! Zero value cannot be transferred')");
            echo("</script>");
        } else {
            $newbalance = $from_user['Balance'] - $amount;
            
            $query = "UPDATE `User` SET `Balance` = $newbalance WHERE `Id` = $from;";
            mysqli_query($conn, $query);
        
            $newbalance = $to_user['Balance'] + $amount;

            $query = "UPDATE `User` SET `Balance` = $newbalance WHERE `Id` = $to;";
            mysqli_query($conn, $query);
            
            $sender = $from_user['Name'];
            $receiver = $to_user['Name'];

            $query = "INSERT INTO `Transaction` (`Sender`, `Receiver`, `Balance`) VALUES ('$sender', '$receiver', $amount)";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo("<script type='text/javascript'>");
                echo("alert('Transaction Successful');");
                echo("window.location='transaction_history.php';");
                echo("</script>");
            }
        }
    }
?>
 
<?php include('nav.php');?>

	<div class="container">

        <h1>Transaction</h1>

        <?php
            $sender_id = $_GET['Id'];

            $query = "SELECT * FROM `User` WHERE `Id` = $sender_id;";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "Error : ".$query."<br>".mysqli_error($conn);
            }

            $row = mysqli_fetch_assoc($result);
        ?>

        <form method="post" name="tcredit" class="tabletext">
        
            <br>

            <div>
                <table class="table table-striped table-condensed table-bordered">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Balance</th>
                    </tr>
                    <tr>
                        <td class="py-2"><?php echo($row['Id']); ?></td>
                        <td class="py-2"><?php echo($row['Name']); ?></td>
                        <td class="py-2"><?php echo($row['Email']); ?></td>
                        <td class="py-2"><?php echo($row['Balance']); ?></td>
                    </tr>
                </table>
            </div>

            <br>

            <label>Transfer To:</label>

            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                    $query = "SELECT * FROM `User` WHERE `Id` != $sender_id;";
                    $result = mysqli_query($conn, $query);

                    if (!$result) {
                        echo("Error ".$query."<br>".mysqli_error($conn));
                    }

                    while($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option class="table" value="<?php echo($rows['Id']); ?>" >
                        <?php echo($rows['Name']); ?> (Balance: <?php echo($rows['Balance']); ?> ) 
                    </option>
                <?php 
                    }
                ?>
            </select>

            <br>
            <br>

            <label>Amount:</label>

            <input type="number" class="form-control" name="amount" required></input>

            <br>
            <br>

            <div class="text-center" >
                <button class="btn btn-primary" name="submit" type="submit" id="btn">Transfer</button>
            </div>
        </form>
    </div>
    
<?php include('footer.php'); ?>