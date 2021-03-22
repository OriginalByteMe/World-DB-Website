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
            <input type = "text" name = "Name" placeholder = "Name"/><br/>
            <input type = "text" name = "CountryCode" placeholder = "Country Code"/><br/>
            <input type = "text" name = "District" placeholder = "District"/><br/>
            <input type = "text" name = "Population" placeholder = "Population"/><br/>

            <input type = "submit" name = "insert" value="insertData"/>
        </form>
    </body>
</html>


<?php
if(isset($_POST['insert'])){
    if(empty($_POST['Name']) || empty($_POST['CountryCode']) || empty($_POST['District']) || empty($_POST['Population']))
    {
        echo ' Please Fill in the Blanks ';
    }else{
        $Name = $_POST['Name'];
        $CountryCode = $_POST['CountryCode'];
        $District = $_POST['District'];
        $Population = $_POST['Population'];
    
        $query = "INSERT INTO city (Name,CountryCode,District,Population) VALUES ('$Name','$CountryCode','$District','$Population')";
        $query_run = mysqli_query($conn,$query);

        if($query_run){
            echo 'row successfully inserted';
            header('Location: cityTable.php');
        }else{
            echo "Error inserting record: " . mysqli_error($conn);
        }
    }
    
}
?>
