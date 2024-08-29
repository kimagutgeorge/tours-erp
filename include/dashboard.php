<?php
$dataPoints = array();

/// Best practice is to create a separate file for handling connection to database
try {
    // Prepare and execute the SQL query
    $query = "
    SELECT 
    day_of_week.day_name AS day_of_week,
    COUNT(booking.check_in) AS bookings_count
FROM 
    (
        SELECT 'Monday' AS day_name
        UNION SELECT 'Tuesday'
        UNION SELECT 'Wednesday'
        UNION SELECT 'Thursday'
        UNION SELECT 'Friday'
        UNION SELECT 'Saturday'
        UNION SELECT 'Sunday'
    ) AS day_of_week
LEFT JOIN 
    booking ON DAYNAME(booking.check_in) = day_of_week.day_name AND
               booking.check_in >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) AND
               booking.check_in <= CURDATE() -- Include bookings up to and including today
GROUP BY 
    day_of_week.day_name
    ORDER BY 
    booking.check_in ASC
    ";
    $result = mysqli_query($conn, $query);

    // Store fetched data into dataPoints array
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($dataPoints, array("label" => $row['day_of_week'], "y" => $row['bookings_count']));
    }
    mysqli_free_result($result);
} catch (\Exception $ex) {
    print($ex->getMessage());
}
?>
<div class="dashboard">
    <!-- <div class="page-title">
        <p>Dashboard</p>
    </div> -->
    <div class="dashboard-top-bar" style="margin-top:20px">
        <div class="small-card">
            <div class="pack">

            </div>
            <div class="small-card-text">
                <p>  PACKAGES</p>
                <?php 
                $packresult=$conn->query("select * from packages");
                $packagecount=mysqli_num_rows($packresult);
                echo "<h4>".$packagecount."</h4>"
                ?>
            </div>
        </div>
        <div class="small-card">
<div class="tour">

            </div>
            <div class="small-card-text">
            <p>  TOURS</p>
            <?php 
                $tourresult=$conn->query("select * from tour_type");
                $tourcount=mysqli_num_rows($tourresult);
                echo "<h4>".$tourcount."</h4>"
                ?>
            </div>
        </div>
        <div class="small-card">
        <div class="dest">

</div>
<div class="small-card-text">
<p>  DESTINATIONS</p>
<?php 
                $desresult=$conn->query("select * from destinations");
                $descount=mysqli_num_rows($desresult);
                echo "<h4>".$descount."</h4>"
                ?>
</div>
        </div>
        <div class="small-card">
        <div class="book">

</div>
<div class="small-card-text">
<p>  BOOKINGS</p>
<?php 
                $bookresult=$conn->query("select * from booking");
                $bookcount=mysqli_num_rows($bookresult);
                echo "<h4>".$bookcount."</h4>"
                ?>
</div>
        </div>
    </div>
    <div class="dashboard-bottom">


        <div class="left-card tour-panel">
            <div class="page-title">
                <p>Recent Booking <i class="fa-regular fa-calendar"></i></p>
                <div class="wrapper">
      <header>
        <p class="current-date"></p>
        <div class="icons">
          <span id="prev" class="material-symbols-rounded"><i class="fa-solid fa-angle-left"></i></span>
          <span id="next" class="material-symbols-rounded"><i class="fa-solid fa-angle-right"></i></span>
        </div>
      </header>
      <div class="calendar">
        <ul class="weeks">
          <li>Sun</li>
          <li>Mon</li>
          <li>Tue</li>
          <li>Wed</li>
          <li>Thu</li>
          <li>Fri</li>
          <li>Sat</li>
        </ul>
        <ul class="days"></ul>
      </div>
    </div>
    <div class="show-books">
        <div class="page-tit">
            <p>Today's Booking</p>
        </div>
        <table>
            <thead>
                <tr>
                <th>Name</th>
                <th>Package</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $result=$conn->query("select * from booking inner join packages on booking.package_id=packages.id and check_in = CURDATE() order by booking.booking_id DESC");
            while($rows=mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $rows["full_name"];?></td>
                    <td><?php echo $rows["package_name"];?>
                    </td>
                </tr>
            <?php }?>
            
                
            </tbody>
        </table>
    </div>
            </div>
        </div>
        <div class="right-card tour-panel">
                <div class="page-title">
                    <p>Booking Stats <i class="fa-solid fa-chart-simple"></i></p>
                </div>
                <div id="chartContainer" style="height: 475px; width: 100%;"></div>

        </div>
    </div>
</div>
<script>
const daysTag = document.querySelector(".days"),
  currentDate = document.querySelector(".current-date"),
  prevNextIcon = document.querySelectorAll(".icons span");

let currYear, currMonth;
let selectedDate = null; // Variable to store the selected date

const fetchBookingDates = () => {
  fetch('class/class.php?action=get_booking')
    .then(response => response.json())
    .then(data => renderCalendar(data))
    .catch(error => console.error('Error fetching booking dates:', error));
};

const renderCalendar = (bookingDates) => {
  const date = new Date();
  currYear = currYear || date.getFullYear();
  currMonth = currMonth || date.getMonth();
  const today = date.getDate();

  const months = [
    "January", "February", "March", "April", "May", "June", 
    "July", "August", "September", "October", "November", "December"
  ];

  let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
  let liTag = "";

  for (let i = firstDayofMonth; i > 0; i--) {
    liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
  }

  for (let i = 1; i <= lastDateofMonth; i++) {
    const isToday = i === today && currMonth === date.getMonth() && currYear === date.getFullYear() ? "active" : "";
    const isBooked = bookingDates.includes(`${currYear}-${String(currMonth + 1).padStart(2, "0")}-${String(i).padStart(2, "0")}`);
    liTag += `<li class="${isToday}${isBooked ? " booked" : ""}" data-date="${i}">${i}</li>`;
  }

  for (let i = lastDayofMonth; i < 6; i++) {
    liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
  }
  currentDate.innerText = `${months[currMonth]} ${currYear}`;
  daysTag.innerHTML = liTag;

  // Attach click event listener to each date element
  document.querySelectorAll(".days li").forEach((dateElement) => {
    dateElement.addEventListener("click", handleDateClick);
  });
};

const handleDateClick = (event) => {
  // Extract the clicked date from the data-date attribute of the clicked element
  const clickedDay = parseInt(event.target.dataset.date);
  
  // Construct a JavaScript Date object with the selected year, month, and day
  const selectedDate = new Date(currYear, currMonth, clickedDay);
  
  // Format the selected date as a string compatible with MySQL (YYYY-MM-DD)
  const mysqlDate = selectedDate.toISOString().split('T')[0];
  data = mysqlDate;
  // Log the selected date in MySQL format (You can modify this part to do whatever you want with the selected date)
 $.ajax({
    url:'class/class.php?action=search-date',
    method:'POST',
    data:{data:data},
    success: function(data){
        $('#response_panel').html(data)
    }
 })
};

fetchBookingDates();

prevNextIcon.forEach((icon) => {
  icon.addEventListener("click", () => {
    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

    if (currMonth < 0) {
      currMonth = 11;
      currYear--;
    } else if (currMonth > 11) {
      currMonth = 0;
      currYear++;
    }

    fetchBookingDates();
  });
});


//graph
window.onload = function () {
        // Define dataPoints variable to store data fetched from PHP
        var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;

        // Print dataPoints to console for debugging
        var maxBookingCount = Math.max.apply(Math, dataPoints.map(function(o) { return o.y; }));
var yAxisInterval = maxBookingCount > 30 ? 5 : 1; // Set interval to 5 if max value > 30, otherwise 1

        // Create CanvasJS chart
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: ""
            },
            axisX: {
            title: "",
            interval: 1, // Display every label
            intervalType: "day", // Treat labels as daily intervals
            labelAngle: -45 // Rotate labels for better readability
        },
            axisY: {
                title: "",
        interval: yAxisInterval, // Set automatic interval based on max booking count
        labelFormatter: function (e) {
            return Math.round(e.value); // Round the y-axis value to remove decimals
        }
            },
            data: [{
                type: "column",
                dataPoints: dataPoints
            }]
        });

        chart.render();
    }
 </script>
 <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>