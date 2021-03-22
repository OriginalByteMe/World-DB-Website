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
        $sql = "SELECT * FROM CountryLanguage WHERE CountryCode LIKE '%$search%' OR Language LIKE '%$search%' OR IsOfficial LIKE '%$search%' OR Percentage LIKE '%$search%';";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        echo '
        <div class= "tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>CountryCode</th>
                        <th>Language</th>
                        <th>IsOfficial</th>
                        <th>Percentage</th>
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
                echo "<td>" .$row["Language"] . "</td>";
                echo "<td>" .$row["IsOfficial"] . "</td>";
                echo "<td>" .$row["Percentage"] . "</td>";
                echo '<td> 
                <form action ="deleteCountryLanguage.php" method="POST"> 
                <input  type="submit" name = "action" value = "Delete" >
                <input type = "hidden" name = "Language" value = ' .$row["Language"].' >
                </form>
                </td>';
                echo "</tr>";

            }
            echo '      </tbody>
                    </table>
                </div>';
        }else{
            echo "<h1>There are no reuslts matching your search</h1>";
        }
    }
    
?>