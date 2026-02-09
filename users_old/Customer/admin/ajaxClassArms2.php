<?php
include 'includes/conn.php';

    $cid = $_GET['cid'];//
    $val_M = mysqli_real_escape_string($conn,$cid);

        $queryss=mysqli_query($conn,"select * from services where service_name='$val_M'");                        
        $countt = mysqli_num_rows($queryss);

        
        echo '
        <select  name="charges" class="form-control mb-3">';
        
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['price'].'" >'.$row['price'].'</option>';
        
        }
        echo '</select>';;
?>

