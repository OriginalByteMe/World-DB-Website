<?php
    include 'includes/header.php';
?>

<html>
<header>
<link rel="stylesheet" href="includes/style.css">
<div class="container blue circleBehind">
        <a class="active" href="cityTable.php">city table</a>
        <a href="countryTable.php">Country Table</a>
        <a href="countryLanguageTable.php">Country Language Table</a>
    </div>
</header>
<body>

<form action ="includes/searchCountryLanguageTable.php" method="POST">
    <input type="text" name = "search" placeholder = "search">
    <button type = "submit" name = "Submit">Submit</button>
</form>

<button type = "submit" name = "Update" class = "updateButton"><a href = "includes/updateCountryLanguage.php">Update</a></button>
<button type = "submit" name = "Insert" class = "insertButton"><a href = "includes/insertCountryLanguage.php">Insert</a></button>




<h1>Welcome to the world database</h1>
<h1> Country Table </h1>
<?php
    $sql = "SELECT * from countrylanguage;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    echo '<div class= "tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>CountryCode</th>
                        <th>Language</th>
                        <th>IsOfficial</th>
                        <th>Precentage</th>
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
            echo "<td>" .$row["Language"] . "</td>";
            echo "<td>" .$row["IsOfficial"] . "</td>";
            echo "<td>" .$row["Percentage"] . "</td>";
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

<script>
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>