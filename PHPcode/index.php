<?php
    include 'header.php';
?>
<header>
    <link rel="stylesheet" href="style.css">
    <div class="container blue circleBehind">
        <a class="active" href="cityTable.php">city table</a>
        <a href="countryTable.php">Country Table</a>
        <a href="countryLanguageTable.php">Country Language Table</a>
    </div>
    <form id = "content" action ="searchCityTable.php" method="POST">
        <input type="text" name = "search" class = "search-bar" placeholder = "search">
        <button type = "submit" name = "Submit"  id = "search-btn">Submit</button>
    </form>
    

    <button type = "submit" name = "Update" class = "updateButton"><a href = "updateCity.php">Update</a></button>
    <button type = "submit" name = "Insert" class = "insertButton"><a href = "insertCity.php">Insert</a></button>
</header>
<body>




<h1>Welcome to the world database</h1>
<h1>City table</h1>
<?php
    $sql = "SELECT * from city;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
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

