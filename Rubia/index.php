<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL</title>
</head>

<body>
  <?php
  // SHOW CODE DEMONSTRATING FETCH_ALL(). USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN. 
  echo ("<pre>");
  $stmt = $pdo->prepare("SELECT * FROM Students");
  if ($stmt->execute()) {
    print_r($stmt->fetchAll());
  }
  echo ("</pre>");



  // SHOW CODE DEMONSTRATING HOW FETCH() IS USED. USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN. 
  echo ("<pre>");
  $stmt = $pdo->prepare("SELECT * FROM Students where student_id = 5");
  if ($stmt->execute()) {
    print_r($stmt->fetchAll());
  }
  echo ("</pre>");

  // SHOW CODE DEMONSTRATING INSERTION OF RECORD TO YOUR DATABASE
  $query = "INSERT INTO Students (student_id, first_name, last_name, date_of_birth, gender, enrollment_date, grade_leve)
VALUES (?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute([1, 'John', 'Doe', '2005-06-15', 'Male', '2021-09-01', 10]);
  if ($executeQuery) {
    echo "Data inserted successfully!";
  } else {
    echo "Error inserting data!";
  }
1
  // SHOW CODE DEMONSTRATING UPDATING OF RECORD FROM YOUR DATABASE
  $query = "UPDATE Students SET  first_name= ?, last_name= ?, date_of_birth= ?, gender= ?, enrollment_date= ?, grade_level WHERE student_id = ?";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute(['Olivia', 'Davis', '2006-11-30', 'Female', '2021-09-01', 9, 5]);
  if ($executeQuery) {
    echo "Data updated successfully!";
  } else {
    echo "Error updating data!";
  }

  // SHOW CODE DEMONSTRATING DELETION OF RECORD TO YOUR DATABASE
  $query = "DELETE FROM Students where student_id = 5";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute();
  if ($executeQuery) {
    echo "Data deleted successfully!";
  } else {
    echo "Error deleting data!";
  }

  // SHOW CODE DEMONSTRATING AN SQL QUERY’S RESULT SET IS RENDERED ON AN HTML TABLE
  $stmt = $pdo->prepare("SELECT * FROM Students");
  if ($stmt->execute()) {
    $results = $stmt->fetchAll(); // Fetch all results
    echo "<table border='2'>";
    echo "<tr>";
    echo "<th>student id</th>";
    echo "<th>first name,</th>";
    echo "<th>last name</th>";
    echo "<th>date of birth</th>";
    echo "<th>gender</th>";
    echo "<th> enrollment date</th>";
    echo "<th>grade level</th>";
    echo "</tr>";
    foreach ($results as $result) {
      echo "<tr>";
      echo "<th>" . $result ['student_id']. "</td>";
      echo "<th>" . $result ['first_name']. "</td>";
      echo "<th>" . $result ['last_name']. "</td>";
      echo "<th>" . $result ['date_of_birth']. "</td>";
      echo "<th>" . $result ['gender']. "</td>";
      echo "<th>" . $result ['enrollment_date']. "</td>";
      echo "<th>" . $result ['grade_level']. "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  ?>
</body>

</html>