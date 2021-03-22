<?php
    include 'header.php';
?>
<html>
<header>
<link rel="stylesheet" href="style.css">
    <div class="container blue circleBehind">
        <a href="cityTable.php">city table</a>
        <a class="active" href="countryTable.php">Country Table</a>
        <a href="countryLanguageTable.php">Country Language Table</a>
    </div>
    <form action ="searchCountryTable.php" method="POST">
        <input type="text" name = "search" placeholder = "search">
        <button type = "submit" name = "Submit">Submit</button>
    </form>
    <button type = "submit" name = "Update" class = "updateButton"><a href = "updateCountry.php">Update</a></button>
    <button type = "submit" name = "Insert" class = "insertButton"><a href = "insertCountry.php">Insert</a></button>
</header>
<body>







<div class= "country">
<h1>Welcome to the world database</h1>
<h1> Country Table </h1>
<?php
    $sql = "SELECT * from country;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    echo '<div class= "tbl-header">
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
    if($resultCheck > 0){
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
        echo "0 result";
    }
?>
</div>

</body>

</html>

<script>
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>