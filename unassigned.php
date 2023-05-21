<?php

// Database connection details

use PhpOffice\PhpSpreadsheet\Calculation\Engine\BranchPruner;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher-room";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve unassigned rooms from the database
$sql = "SELECT * FROM room WHERE room_id NOT IN (SELECT room_id FROM assignment)";
$result = $conn->query($sql);

// Check if any unassigned rooms were found
if ($result->num_rows > 0) {
  // Store the unassigned rooms in an array
  $unassignedRooms = array();
  while ($row = $result->fetch_assoc()) {
    $unassignedRooms[] = $row;
  }
} else {
  $unassignedRooms = array();
}

// Close the database connection
$conn->close();
?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Room</title>
  <link rel="icon" href="images/LOGO.png">
  <link rel="stylesheet" href="css/framework.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,600;1,300;1,500&family=Poppins:wght@100;300&display=swap" rel="stylesheet">
</head>

<body>
  <div class="page d-flex">
    <div class="sidebar bg-white p-20 p-relative">
      <img src="images/Dutch.png" class="p-relative txt-center mt-0">
      <ul class="menu">
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-house-chimney fa-fw"></i>
            <span class="hide-mobile"> Home</span>
          </a>
        </li>
        <li>
          <a class="Sub-menu d-flex align-center fs-14 c-black rad-6 p-10" href="teacher.php">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span> Teacher</span>
          </a>
          <ul class="dropdown">
            <li>
              <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="AddTeacher.html">
                <i class="fa-solid fa-user-plus"></i>ADD Teacher</a>


            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href=""><i class="fa-solid fa-user-pen"></i>Modify Teacher</a>


            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href=""><i class="fa-solid fa-user-minus"></i>Delete Teacher</a>


            </li>
          </ul>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="room.php">
            <i class="fa-solid fa-table-list"></i>
            <span>Room</span>
          </a>
          <ul class="dropdown">
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Addroom.html"><i class="fa-solid fa-user-plus"></i>ADD Room</a>

            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href=""><i class="fa-solid fa-user-pen"></i>Modify Room</a>

            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href=""><i class="fa-solid fa-user-minus"></i>Delete Room</a>

            </li>
          </ul>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="assignment.php">
            <i class="fa-solid fa-clipboard-question"></i>
            <span>Assignments</span>
          </a>
          <ul class="dropdown">
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Addassignment.php"> <i class="fa-solid fa-user-plus"></i> ADD Assignment</a>

            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="#"><i class="fa-solid fa-user-pen"></i>Modify Assignment</a>


            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="#"><i class="fa-solid fa-user-minus"></i>Delete Assignment</a>

            </li>
          </ul>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-clipboard-list"></i>
            <span>Room Report</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-clipboard-list"></i>
            <span>Teacher Report</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-table"></i>
            <span>Room Availability</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-arrow-up-right-dots"></i>
            <span>Most Used Room</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="export_pdf.php">
            <i class="fa-solid fa-right-to-bracket"></i>
            <span>Download PDF</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-person-circle-plus"></i>
            <span>Sign-Up</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="header finisher-header w-full p-relative ">
      <div class="icon1">
        <img class="icon-1" src="images/pngwing.com (1).png" alt="">
      </div>
      <div class="icon2">
        <img class="icon-2" src="images/pngwing.com (2).png" alt="">
      </div>
      <div class="iconscirc">
        <img class="icons-circ" src="images/circle-scatter-haikei.svg" alt="">
      </div>


      <div class="ADD-teacher-page p-relative">
        <div class="Information-boxes p-20 bg-white rad-10 m-60">
          <div class="content">
            <h1 style="text-align: center;">Unassigned Rooms</h1>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "teacher-room";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            if (!empty($unassignedRooms)) {
              echo "<table  style='width:85%;margin-left:110px;' class='Timetable-addteacher'>";
              echo "<tr>";
              echo "<td style='text-align: center;'>Room ID</td>";
              echo "<td style='text-align: center;'>Room Number</td>";
              echo "<td style='text-align: center;'>Room Name</td>";
              echo "<td style='text-align: center;'>Machines</td>";
              echo "<td style='text-align: center;'>Capacity</td>";
              echo "</tr>";

              // Loop through each unassigned room and display its information in a row
              foreach ($unassignedRooms as $unassignedRoom) {
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $unassignedRoom['room_id'] . "</td>";
                echo "<td style='text-align: center;'>" . $unassignedRoom['room_number'] . "</td>";
                echo "<td style='text-align: center;'>" . $unassignedRoom['room_name'] . "</td>";
                echo "<td style='text-align: center;'>" . $unassignedRoom['machines'] . "</td>";
                echo "<td style='text-align: center;'>" . $unassignedRoom['capacity'] . "</td>";
                echo "</tr>";
              }

              echo "</table>";
              echo "<div style='text-align: center; margin-top: 20px;'>";
              echo "<a href='download.php?type=pdf' class='btn-download'>Download as PDF</a>";
              echo "<br>";
              echo "<a href='download.php?type=excel' class='btn-download'>Download as Excel</a>";
              echo "</div>";
            } else {
              echo "<p style='text-align: center;'>No unassigned rooms found.</p>";
            }
            mysqli_close($conn);
            ?>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="finisher-header.es5.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    new FinisherHeader({
      "count": 12,
      "size": {
        "min": 1300,
        "max": 1500,
        "pulse": 0
      },
      "speed": {
        "x": {
          "min": 0.6,
          "max": 3
        },
        "y": {
          "min": 0.6,
          "max": 3
        }
      },
      "colors": {
        "background": "#398fe2",
        "particles": [
          "#1e9359",
          "#87ddfe",
          "#231efe",
          "#0affe6"
        ]
      },
      "blending": "overlay",
      "opacity": {
        "center": 1,
        "edge": 0
      },
      "skew": 0,
      "shapes": [
        "c"
      ]
    });
  </script>

  </div>

</body>

</html>