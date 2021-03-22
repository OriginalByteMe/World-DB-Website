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
        <input type = "text" name = "CountryCode" placeholder = "Enter CountryCode"/><br/>
        <input type = "text" name = "Name" placeholder = "Enter city name"/><br/>
        <input type = "text" name = "Continent" placeholder = "Enter Continent"/><br/>
        <input type = "text" name = "Region" placeholder = "Enter Region"/><br/>
        <input type = "text" name = "SurfaceArea" placeholder = "Enter SurfaceArea"/><br/>
        <input type = "text" name = "IndependantYear" placeholder = "Enter IndependantYear"/><br/>
        <input type = "text" name = "Population" placeholder = "Enter Population"/><br/>
        <input type = "text" name = "LifeExpectancy" placeholder = "Enter LifeExpectancy"/><br/>
        <input type = "text" name = "GNP" placeholder = "Enter GNP"/><br/>
        <input type = "text" name = "GNPOld" placeholder = "Enter GNPOld"/><br/>
        <input type = "text" name = "LocalName" placeholder = "Enter LocalName"/><br/>
        <input type = "text" name = "GovernmentForm" placeholder = "Enter GovernmentForm"/><br/>
        <input type = "text" name = "HeadOfState" placeholder = "Enter HeadOfState"/><br/>
        <input type = "text" name = "Capital" placeholder = "Enter Capital"/><br/>
        <input type = "text" name = "CountryCode2" placeholder = "Enter CountryCode2"/><br/>

        <input type = "submit" name = "update" value="updateData"/>
    </form>
</body>
</html>


<?php
if(isset($_POST['update'])){
    $CountryCode = $_POST['CountryCode'];
    $Name = $_POST['Name'];
    $Continent = $_POST['Continent'];
    $Region = $_POST['Region'];
    $SurfaceArea = $_POST['SurfaceArea'];
    $IndependantYear = $_POST['IndependantYear'];
    $Population = $_POST['Population'];
    $LifeExpectancy = $_POST['LifeExpectancy'];
    $GNP = $_POST['GNP'];
    $GNPOld = $_POST['GNPOld'];
    $LocalName = $_POST['LocalName'];
    $GovernmentForm = $_POST['GovernmentForm'];
    $Capital = $_POST['Capital'];
    $CountryCode2 = $_POST['CountryCode2'];

  
    $query = "UPDATE country SET  CountryCode = '".$CountryCode."', Name='".$Name."', Continent = '".$Continent."', 
    Region = '".$Region."', SurfaceArea = '".$SurfaceArea."', SurfaceArea = '".$SurfaceArea."', IndependantYear = '".$IndependantYear."', Population = '".$Population."',
    LifeExpectancy = '".$LifeExpectancy."', GNP = '".$GNP."', GNPOld = '".$GNPOld."', LocalName = '".$LocalName."', GovernmentForm = '".$GovernmentForm."', 
    Capital = '".$Capital."', CountryCode2 = '".$CountryCode2."' WHERE CountryCode = $CountryCode;";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo 'row successfully updated';
    }else{
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
