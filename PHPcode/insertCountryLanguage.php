<?php
    include 'header.php';
?>
<?php
function enumDropdown($table_name, $column_name, $echo = false)
{
   $selectDropdown = "<select name=\"$column_name\">";
   $result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
       WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
   or die (mysql_error());

    $row = mysql_fetch_array($result);
    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

    foreach($enumList as $value)
         $selectDropdown .= "<option value=\"$value\">$value</option>";

    $selectDropdown .= "</select>";

    if ($echo)
        echo $selectDropdown;

    return $selectDropdown;
}

?>
<html>
<head>
    <link rel="stylesheet" href="includes/style.css">
    <div class="container blue circleBehind">
        <a  href="cityTable.php">city table</a>
        <a href="countryTable.php">Country Table</a>
        <a href="countryLanguageTable.php">Country Language Table</a>
    </div>
</head>
<body>
    
    <form action ="" method = "POST">
        <input type = "text" name = "CountryCode" placeholder = "Country Code"/><br/>
        <input type = "text" name = "Language" placeholder = "Country Language"/><br/>
        <input type = "text" name = "Percentage" placeholder =  "Percentage"/><br/>
        <?php 
            $table_name = "countrylanguage";
            $column_name = "IsOfficial";

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

        <input type = "submit" name = "insert" value="insertData"/>
    </form>
</body>
</html>

<?php
if(isset($_POST['insert'])){
    if(empty($_POST['CountryCode']) || empty($_POST['Language']) || empty($_POST['Percentage']))
    {
        echo '<h1> Please Fill in the Blanks</h1> ';
    }else{
        $CountryCode = $_POST['CountryCode'];
        $Language = $_POST['Language'];
        //$IfOfficail = $_POST['IsOfficial'];
        $Percentage = $_POST['Percentage'];
    
        $query = "INSERT INTO countrylanguage (CountryCode,Language, IsOfficial, Percentage) VALUES ('$CountryCode','$Language','$value',$Percentage)";
        $query_run = mysqli_query($conn,$query);

        if($query_run){
            echo 'row successfully inserted';
            header('Location: countryLanguageTable.php');
        }else{
            echo "Error inserting record: " . mysqli_error($conn);
        }
    }
}
?>




