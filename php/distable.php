function disTable($conn) {
    $sqlselect = "SELECT id,name,email,school FROM fulltest";
    $result = $conn->query($sqlselect);

    $end = $result->num_rows;
    /*for ($i = 0; $i < result; $i++) {
       echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. " - School: " . $row["school"];
    }*/
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["school"] . "</td></tr>";
    }
}