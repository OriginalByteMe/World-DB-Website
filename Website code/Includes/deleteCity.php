<?php
    include 'header.php';
?>

<html>

    <body>
        <form action ="" method = "POST">
            <input type = "text" name = "ID" placeholder = "Enter city ID"/><br/>
            <input type = "text" name = "Name" placeholder = "Enter city name"/><br/>
            <input type = "text" name = "CountryCode" placeholder = "Enter city Country Code"/><br/>
            <input type = "text" name = "District" placeholder = "Enter city District"/><br/>
            <input type = "text" name = "Population" placeholder = "Enter city Population"/><br/>

            <input type = "submit" name = "update" value="updateData"/>
        </form>
    </body>
</html>


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


    

   
?>

