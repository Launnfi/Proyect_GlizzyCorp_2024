<?php
include("db.php");
include("functions/functions.php");

if (isset($_POST['pro_id'])) {
    $pro_id = $_POST['pro_id'];
    $ip_add = getRealIpUser();
    
    $elim_prod = "DELETE FROM cart WHERE p_id = '$pro_id' AND ip_add = '$ip_add'";
    $run_elim = mysqli_query($con, $elim_prod);
    
    if ($run_elim) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
