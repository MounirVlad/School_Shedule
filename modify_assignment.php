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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $assignmentId = $_POST['id'];
  $teacher_name = isset($_POST['teacher_name']) ? $_POST['teacher_name'] : '';
  $day = isset($_POST['day']) ? $_POST['day'] : '';
  $schedule_value = $_POST['schedule_value'];
  $room_name = isset($_POST['room_name']) ? $_POST['room_name'] : '';
  $room_machines = isset($_POST['room_machines']) ? $_POST['room_machines'] : '';
  // Update the teacher's information in the database
  $query = "UPDATE assingment_teacher SET teacher_name='$teacher_name', day='$day', schedule_value='$schedule_value', room_name='$room_name', room_machines='$room_machines' WHERE id=$assignmentId";
  $result = mysqli_query($conn, $query);
  if ($result) {
    header("Location: assignment.php");
    exit();
  } else {
    echo "Update failed.";
  }
} else if (isset($_GET['id'])) {
  $teacher_name = $_GET['id'];
  $query = "SELECT * FROM assignment_teacher WHERE id = $assignmentId";
  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $assignment_teacher = mysqli_fetch_assoc($result); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Add Room</title>
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
          <div class="ADD-teacher-page p-relative" style="margin-top: 90px;">
            <div class="Information-boxes p-20 bg-white rad-10 m-60">
              <h2 class="mt-0 mb-10 ffOS">Modify Room</h2>
              <p class="mt-0 mb-20 c-grey  fs-15">Modify Room information</p>
              <form action="" method="post">
                <table>
                  <tr>
                    <td>
                      <div class="focus-icon d-flex align-center mb-15 m-20">
                        <i class="fa-solid fa-hashtag p-10 c-grey"></i>
                        <input type="hidden" name="room_id" value="<?php echo $assignment_teacher['id']; ?>">
                        <select name="teacher" id="teacher" class="w-full c-grey" required value="<?php echo $assignment_teacher['teacher_name']; ?>">
                          <option value="" disabled selected>Select Teacher</option>
                          <?php
                          // Assuming you have established a database connection

                          // Retrieve the list of teachers
                          $teacherQuery = "SELECT id, FirstLastname FROM teacher";
                          $teacherResult = mysqli_query($connection, $teacherQuery);

                          while ($teacher = mysqli_fetch_assoc($teacherResult)) {
                            $teacherId = $teacher["id"];
                            $teacherName = $teacher["FirstLastname"];
                            echo "<option value='$teacherId'>$teacherName</option>";
                          }
                          ?>
                        </select>
                      </div>
                    <td>
                      <div class="focus-icon d-flex align-center mb-15 m-20">
                        <i class="fa-solid fa-folder-open p-10 c-grey"></i>
                        <select name="teacher_schedule" id="teacher_schedule" class="w-full c-grey" required value="<?php echo $assignment_teacher['day']; ?>">
                          <option value="" disabled selected>Select Day and Time</option>
                          <?php
                          // Retrieve the teacher's teacher_schedule
                          $teacher_scheduleQuery = "SELECT id, day, value FROM teacher_schedule";
                          $teacher_scheduleResult = mysqli_query($connection, $teacher_scheduleQuery);

                          while ($teacher_schedule = mysqli_fetch_assoc($teacher_scheduleResult)) {
                            $teacher_scheduleId = $teacher_schedule["id"];
                            $teacher_scheduleDay = $teacher_schedule["day"];
                            $teacher_scheduleValue = $teacher_schedule["value"];
                            echo "<option value='$teacher_scheduleId' data-day='$teacher_scheduleDay' data-value='$teacher_scheduleValue'>$teacher_scheduleDay ($teacher_scheduleValue)</option>";
                          }
                          ?>

                        </select>

                      </div>
                    </td>
                    <td colspan="6">
                      <div class="focus-icon d-flex align-center mb-15 m-20">
                        <i class="fa-solid fa-folder-open p-10 c-grey"></i>
                        <input class="w-full" type="text" name="room_name" placeholder="Room name" required value="<?php echo $room['room_name']; ?>">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="focus-icon d-flex align-center mb-15 m-20">
                        <i class="fa-solid fa-desktop p-10 c-grey"></i>
                        <input class="w-full" type="number" name="machines" placeholder="Number of machines" required maxlength="3" value="<?php echo $room['machines']; ?>">
                      </div>
                    </td>
                    <td colspan="6">
                      <div class="focus-icon d-flex align-center mb-15 m-20">
                        <i class="fa-solid fa-user p-10 c-grey"></i>
                        <input class="w-full c-grey" type="number" name="capacity" placeholder="The maximum number of students" required maxlength="3" value="<?php echo $room['capacity']; ?>">
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
                <div class="buttons" style="top:-21px;margin-top:50px;">
                  <button type="reset" style="top: 0;left: 0;"><span></span>RESET</button>
                  <button type="submit" name="insertd" style="top: 0;left: 0;"><span></span>SAVE</button>
                </div>

              </form>

          <?php
        } else {
          echo "Room not found.";
        }
      } else {
        echo "Invalid request.";
      }

      // Close the database connection
      mysqli_close($conn);
          ?>

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