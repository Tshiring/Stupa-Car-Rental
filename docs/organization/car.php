<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

?>

<?php require '../components/head.php' ?>

<body>
    <div class="container">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="#add-car">Add Car</a></li>
                <li><a href="#available-cars">Available Cars</a></li>
                <li><a href="#rental-records">Rental Records</a></li>
                <li>
                    <a href="docs/logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Car Rental Dashboard</h1>

            <div id="add-car" class="car-form">
                <h2>Add a New Car</h2>
                <form id="car-form">
                    <label for="car-image">Upload Car Image:</label>
                    <input type="file" id="car-image" name="car-image" accept="image/*">

                    <label for="car-name">Car Name:</label>
                    <input type="text" id="car-name" name="car-name">

                    <label for="car-price">Price:</label>
                    <input type="text" id="car-price" name="car-price">

                    <label for="car-mileage">Mileage:</label>
                    <input type="text" id="car-mileage" name="car-mileage">

                    <label for="car-transmission">Transmission:</label>
                    <input type="text" id="car-transmission" name="car-transmission">

                    <label for="car-people">People Capacity:</label>
                    <input type="text" id="car-people" name="car-people">

                    <label for="car-electric">Electric:</label>
                    <input type="text" id="car-electric" name="car-electric">

                    <button type="submit">Add Car</button>
                </form>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>