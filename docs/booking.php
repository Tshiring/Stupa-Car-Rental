<?php
session_start();
?>

<?php require './components/head.php' ?>

<body>
  <?php require './components/nav.php' ?>

  <div class="booking container">
    <h1>Car Detail</h1>
    <?php
    if (isset($_GET["id"])) {
      $id = $_GET["id"];
      include("./database.php");

      // Ensure the id is an integer to avoid SQL injection
      $id = intval($id);

      $sql = "SELECT * FROM cars WHERE id=$id";
      $result = mysqli_query($conn, $sql);

      // Check if the query was successful and returned a result
      if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
    ?>
        <div class="booking__wrapper">
          <img src="<?php echo $row["image"] ?>" alt="">
          <div>
            <div class="car-desc">
              <div class="car-infos">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_1_5117)">
                    <path d="M10 1.66669V3.75002M10 1.66669C5.39765 1.66669 1.66669 5.39765 1.66669 10M10 1.66669C14.6024 1.66669 18.3334 5.39765 18.3334 10M10 16.25V18.3334M10 18.3334C14.6024 18.3334 18.3334 14.6024 18.3334 10M10 18.3334C5.39765 18.3334 1.66669 14.6024 1.66669 10M3.75002 10H1.66669M18.3334 10H16.25M15.8987 15.8987L14.4206 14.4206M4.10138 15.8987L5.58098 14.4191M4.10138 4.16669L5.54842 5.61373M15.8987 4.16669L11.2499 8.75002M11.6667 10C11.6667 10.9205 10.9205 11.6667 10 11.6667C9.07955 11.6667 8.33335 10.9205 8.33335 10C8.33335 9.07955 9.07955 8.33335 10 8.33335C10.9205 8.33335 11.6667 9.07955 11.6667 10Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </g>
                  <defs>
                    <clipPath id="clip0_1_5117">
                      <rect width="20" height="20" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
                <p><?php echo $row["mileage"] ?></p>
              </div>
              <div class="car-infos">
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <ellipse cx="4.83332" cy="4.99998" rx="1.66667" ry="1.66667" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <ellipse cx="10.6667" cy="4.99998" rx="1.66667" ry="1.66667" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <ellipse cx="16.5" cy="4.99998" rx="1.66667" ry="1.66667" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <ellipse cx="4.83332" cy="15" rx="1.66667" ry="1.66667" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <ellipse cx="10.6667" cy="15" rx="1.66667" ry="1.66667" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M4.83332 6.66669V13.3334" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M10.6667 6.66669V13.3334" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M16.5 6.66669V8.33335C16.5 9.25383 15.7538 10 14.8333 10H4.83331" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p><?php echo $row["transmission"] ?></p>
              </div>
              <div class="car-infos">
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.6666 17.5V15.8333C18.6666 14.2801 17.6043 12.9751 16.1666 12.605M13.25 2.7423C14.4716 3.23679 15.3333 4.43443 15.3333 5.83333C15.3333 7.23224 14.4716 8.42988 13.25 8.92437M14.5 17.5C14.5 15.9469 14.5 15.1703 14.2462 14.5577C13.9079 13.741 13.259 13.092 12.4422 12.7537C11.8297 12.5 11.0531 12.5 9.49997 12.5H6.99997C5.44683 12.5 4.67026 12.5 4.05769 12.7537C3.24093 13.092 2.59202 13.741 2.2537 14.5577C1.99997 15.1703 1.99997 15.9469 1.99997 17.5M11.5833 5.83333C11.5833 7.67428 10.0909 9.16667 8.24997 9.16667C6.40902 9.16667 4.91664 7.67428 4.91664 5.83333C4.91664 3.99238 6.40902 2.5 8.24997 2.5C10.0909 2.5 11.5833 3.99238 11.5833 5.83333Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p><?php echo $row["capacity"] ?> Person</p>
              </div>
              <div class="car-infos">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.6667 9.16667H12.5C13.4205 9.16667 14.1667 9.91286 14.1667 10.8333V13.3333C14.1667 14.0237 14.7263 14.5833 15.4167 14.5833C16.107 14.5833 16.6667 14.0237 16.6667 13.3333V7.5L14.1667 5" stroke="#ffffff" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M3.33334 16.6666V4.99998C3.33334 4.07951 4.07954 3.33331 5.00001 3.33331H10C10.9205 3.33331 11.6667 4.07951 11.6667 4.99998V16.6666" stroke="#ffffff" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M2.5 16.6667H12.5" stroke="#ffffff" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M15 5.83331V6.66665C15 7.12688 15.3731 7.49998 15.8333 7.49998H16.6667" stroke="#ffffff" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M3.33334 9.16667H11.6667" stroke="#ffffff" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p><?php echo $row["type"] ?></p>
              </div>
            </div>
            <form action="docs/charge.php" method="post">
              <h2><?php echo $row['name'] ?></h2>
              <p><span>US$</span> <?php echo $row['price'] ?></p>
              <input type="hidden" name="car_name" value="<?php echo $row['name'] ?>">
              <input type="hidden" name="car_price" value="<?php echo $row['price'] * 100; ?>">
              <button class="white-btn">Pay</button>
            </form>
          </div>
        </div>
    <?php
      } else {
        echo "<p>No car found with the provided ID.</p>";
      }
    } else {
      echo "<p>No ID provided in the query string.</p>";
    }
    ?>
  </div>
</body>

</html>