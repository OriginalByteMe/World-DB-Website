<?php
    include 'header.php';
?>
<head>
    <link rel="stylesheet" href="style.css">
    <div class="container blue circleBehind">
        <a href="cityTable.php">city table</a>
        <a href="countryTable.php">Country Table</a>
        <a href="countryLanguageTable.php">Country Language Table</a>
    </div>
</head>
<h1>Search Page</h1>


<?php
    if(isset($_POST['Submit'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM country WHERE CountryCode LIKE '%$search%' OR Name LIKE '%$search%' OR Continent LIKE '%$search%' OR Region LIKE '%$search%' OR SurfaceArea LIKE '%$search%' 
        OR IndependantYear LIKE '%$search%' OR Population LIKE '%$search%' OR LifeExpectancy LIKE '%$search%' OR GNP LIKE '%$search%' OR GNPOld LIKE '%$search%' OR LocalName LIKE '%$search%' 
        OR GovernmentForm LIKE '%$search%' OR HeadOfState LIKE '%$search%' OR Capital LIKE '%$search%' OR CountryCode2 LIKE '%$search%';";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        echo '
        <div class= "tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>CountryCode</th>
                        <th>Name</th>
                        <th>Continent</th>
                        <th>Region</th>
                        <th>SurfaceArea</th>
                        <th>IndependantYear</th>
                        <th>Population</th>
                        <th>LifeExpectancy</th>
                        <th>GNP</th>
                        <th>GNPOld</th>
                        <th>LocalName</th>
                        <th>GovernmentForm</th>
                        <th>HeadOfState</th>
                        <th>Capital</th>
                        <th>CountryCode2</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>';
        echo '<div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>';
        if($queryResult > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" .$row["CountryCode"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Continent"] . "</td>";
                echo "<td>" . $row["Region"] . "</td>";
                echo "<td>" . $row["SurfaceArea"] . "</td>";
                echo "<td>" .$row["IndependantYear"] . "</td>";
                echo "<td>" .$row["Population"] . "</td>";
                echo "<td>" .$row["LifeExpectancy"] . "</td>";
                echo "<td>" .$row["GNP"] . "</td>";
                echo "<td>" .$row["GNPOld"] . "</td>";
                echo "<td>" .$row["LocalName"] . "</td>";
                echo "<td>" .$row["GovernmentForm"] . "</td>";
                echo "<td>" .$row["HeadOfState"] . "</td>";
                echo "<td>" .$row["Capital"] . "</td>";
                echo "<td>" .$row["CountryCode2"] . "</td>";
                echo '<td> 
                <form action ="deleteCountry.php" method="POST"> 
                <input  type="submit" name = "action" value = "Delete" >
                 <input type = "hidden" name = "ID" value = ' .$row["CountryCode"].' >
                </form>
                 </td>';
                echo "</tr>";

            }
            echo '      </tbody>
                    </table>
                </div>';
        }
        else{
            echo '<h1>There are no reuslts matching your search</h1>';
        }
    }
    
?>