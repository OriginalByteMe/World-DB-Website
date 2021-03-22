<?php
    include 'header.php';
?>



<?php
if ($_POST['action'] && $_POST['ID']) {
    if ($_POST['action'] == 'Delete') {
        $C_ID = $_POST['ID'];
        $query = "DELETE FROM city WHERE id= $C_ID";
        $query_run = mysqli_query($conn,$query);
        if($query_run){
            echo 'row successfully deleted';
        }else{
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
  }

  header('Location: cityTable.php');
?>

