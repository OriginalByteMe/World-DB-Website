<?php
    include 'header.php';
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
    <div class="container blue circleBehind">
        <a href="cityTable.php">city table</a>
        <a href="countryTable.php">Country Table</a>
        <a href="countryLanguageTable.php">Country Language Table</a>
    </div>
</head>
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
if(isset($_POST['update'])){
    $id = $_POST['ID'];
    $Name = $_POST['Name'];
    $CountryCode = $_POST['CountryCode'];
    $District = $_POST['District'];
    $Population = $_POST['Population'];
  
    $query = "UPDATE city SET  ID = '".$id."', Name='".$Name."', CountryCode = '".$CountryCode."', District = '".$District."', Population = '".$Population."' WHERE ID = $id;";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo 'row successfully updated';
    }else{
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
