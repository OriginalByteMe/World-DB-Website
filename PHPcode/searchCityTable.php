<?php
    include 'header.php';
?>
<header>
    <link rel="stylesheet" href="style.css">
    <div class="container blue circleBehind">
        <a href="cityTable.php">City table</a>
        <a href="countryTable.php">Country Table</a>
        <a href="countryLanguageTable.php">Country Language Table</a>
    </div>
</header>
<h1>search page</h1>


<?php
    if(isset($_POST['Submit'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM city WHERE ID LIKE '%$search%' OR CountryCode LIKE '%$search%' OR District LIKE '%$search%' OR Name LIKE '%$search%' OR Population LIKE '%$search%';";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        echo '
        <div class= "tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country Code</th>
                        <th>District</th>
                        <th>Population</th>
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
                echo "<td>" .$row["ID"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["CountryCode"] . "</td>";
                echo "<td>" . $row["District"] . "</td>";
                echo "<td>" . $row["Population"] . "</td>";
                echo '<td> 
                <form action ="deleteCity.php" method="POST"> 
                <input  type="submit" name = "action" value = "Delete" >
                <input type = "hidden" name = "ID" value = ' .$row["ID"].' >
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