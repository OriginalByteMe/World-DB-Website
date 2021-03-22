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
        <form action ="" method = "POST" class = "contact-form">
            <input type = "text" name = "CountryCode" placeholder = "CountryCode"/><br/>
            <input type = "text" name = "Name" placeholder = "City Name"/><br/>
            <?php 
                $table_name = "country";
                $column_name = "Continent";

                echo "<select name=\"$column_name\"><option>Select one</option>";
                $q = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
                $r = mysqli_query($conn, $q);

                $row = mysqli_fetch_array($r);

                $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
                foreach($enumList as $value)
                    echo "<option value=\"$value\">$value</option>";

                echo "</select>";
            ?></br>
            <input type = "text" name = "Region" placeholder = "Region"/><br/>
            <input type = "text" name = "SurfaceArea" placeholder = "SurfaceArea"/><br/>
            <input type = "text" name = "IndependantYear" placeholder = "IndependantYear"/><br/>
            <input type = "text" name = "Population" placeholder = "Population"/><br/>
            <input type = "text" name = "LifeExpectancy" placeholder = "LifeExpectancy"/><br/>
            <input type = "text" name = "GNP" placeholder = "GNP"/><br/>
            <input type = "text" name = "GNPOld" placeholder = "GNPOld"/><br/>
            <input type = "text" name = "LocalName" placeholder = "LocalName"/><br/>
            <input type = "text" name = "GovernmentForm" placeholder = "GovernmentForm"/><br/>
            <input type = "text" name = "HeadOfState" placeholder = "HeadOfState"/><br/>
            <input type = "text" name = "Capital" placeholder = "Capital Number"/><br/>
            <input type = "text" name = "CountryCode2" placeholder = "CountryCode2"/><br/>

            <input type = "submit" name = "insert" value="insertData"/>
        </form>
    </body>
</html>


<?php
if(isset($_POST['insert'])){
    if(empty($_POST['CountryCode']) || empty($_POST['Name']) || empty($_POST['Region']) || empty($_POST['SurfaceArea']) 
    || empty($_POST['IndependantYear']) || empty($_POST['Population']) || empty($_POST['LifeExpectancy']) || empty($_POST['GNP']) || empty($_POST['GNPOld']) 
    || empty($_POST['LocalName']) || empty($_POST['GovernmentForm']) || empty($_POST['Capital']) || empty($_POST['CountryCode2']))
    {
        echo ' <h1>Please Fill in the Blanks </h1>';
    }else{
        $CountryCode = $_POST['CountryCode'];
        $Name = $_POST['Name'];
        $Continent = $value;
        $Region = $_POST['Region'];
        $SurfaceArea = $_POST['SurfaceArea'];
        $IndependantYear = $_POST['IndependantYear'];
        $Population = $_POST['Population'];
        $LifeExpectancy = $_POST['LifeExpectancy'];
        $GNP = $_POST['GNP'];
        $GNPOld = $_POST['GNPOld'];
        $LocalName = $_POST['LocalName'];
        $GovernmentForm = $_POST['GovernmentForm'];
        $HeadOfState = $_POST['HeadOfState'];
        $Capital = $_POST['Capital'];
        $CountryCode2 = $_POST['CountryCode2'];

    
        $query = "INSERT INTO country (CountryCode, Name, Continent, Region, SurfaceArea, IndependantYear, Population, LifeExpectancy, GNP, GNPOld, LocalName, GovernmentForm, HeadOfState, Capital, CountryCode2) 
        VALUES ('$CountryCode', '$Name', '$Continent', '$Region', $SurfaceArea, $IndependantYear, $Population, $LifeExpectancy, $GNP, $GNPOld, '$LocalName', '$GovernmentForm', '$HeadOfState', $Capital, '$CountryCode2')";
        $query_run = mysqli_query($conn,$query);

        if($query_run){
            echo 'row successfully inserted';
            header('Location: countryTable.php');
        }else{
            echo "Error inserting record: " . mysqli_error($conn);
        }
    }
}
?>
