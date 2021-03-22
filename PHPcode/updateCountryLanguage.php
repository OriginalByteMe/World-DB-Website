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
        <input type = "text" name = "CountryCode" placeholder = "Enter Country Language Country Code"/><br/>
        <input type = "text" name = "Language" placeholder = "Enter Country Language Country Language"/><br/>
        <input type = "text" name = "IsOfficial" placeholder = "Enter Country Language Country IsOfficial"/><br/>
        <input type = "text" name = "Percentage" placeholder = "Enter Country Language Country Percentage"/><br/>

        <input type = "submit" name = "update" value="updateData"/>
    </form>
</body>
</html>


<?php
if(isset($_POST['update'])){
    $CountryCode = $_POST['CountryCode'];
    $Language = $_POST['Language'];
    $IfOfficail = $_POST['IsOfficial'];
    $Percentage = $_POST['Percentage'];
  
    $query = "UPDATE CountryLanguage SET  CountryCode = '".$CountryCode."', Language='".$Language."', IfOfficail = '".$IfOfficail."', Percentage = '".$Percentage."' WHERE CountryCode = $CountryCode;";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo 'row successfully updated';
    }else{
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
