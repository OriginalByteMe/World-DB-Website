<?php
    include 'header.php';
?>



<?php
if ($_POST['action'] && $_POST['CountryCode']) {
    if ($_POST['action'] == 'Delete') {
        $CountryCode = $_POST['CountryCode'];
        $query = "DELETE FROM country WHERE CountryCode= $CountryCode";
        $query_run = mysqli_query($conn,$query);
        if($query_run){
            echo 'row successfully deleted';
        }else{
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
  }

  header('Location: countryTable.php');
?>