<?php
    include 'header.php';
?>



<?php
if ($_POST['action'] && $_POST['Language'] && $_POST['CountryCode']) {
    if ($_POST['action'] == 'Delete') {
        $Language = $_POST['Language'];
        $CountryCode = $_POST['CountryCode'];
        $query = "DELETE FROM countrylanguage WHERE CountryCode = '$CountryCode' AND Language= '$Language'";
        $query_run = mysqli_query($conn,$query);
        if($query_run){
            echo 'row successfully deleted';
        }else{
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
  }

  header('Location: countryLanguageTable.php');
?>

