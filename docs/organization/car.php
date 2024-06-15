<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

?>

<?php require '../components/head.php' ?>

<body>
    <div class="container">
        <?php require './sidebar.php' ?>
        <div class="main-content">
            <h1>Add Car</h1>
            <div id="add-car" class="car-form">
                <h2>Add a New Car</h2>
                <form id="car-form">
                    <label for="car-image">Upload Car Image:</label>
                    <input type="file" id="car-image" name="car-image" accept="image/*">

                    <label for="car-name">Car Name:</label>
                    <input type="text" id="car-name" name="car-name">

                    <label for="car-price">Price:</label>
                    <input type="type" inputmode="numeric" id="car-price" name="car-price">

                    <label for="car-mileage">Mileage:</label>
                    <input type="type" inputmode="numeric" id="car-mileage" name="car-mileage">

                    <label for="vehicle-type">Transmission:</label>
                    <select id="vehicle-type" name="vehicle-type">
                        <option value="">Transmission</option>
                        <option value="auto">Auto</option>
                        <option value="manual">Manual</option>
                    </select>

                    <label for="car-people">People Capacity:</label>
                    <input type="text" id="car-people" name="car-people">

                    <label for="vehicle-type">Type of Vehicle:</label>
                    <select id="vehicle-type" name="vehicle-type">
                        <option value="">Type of Vehicle</option>
                        <option value="electric">Electric</option>
                        <option value="fuel">Fuel</option>
                    </select>

                    <button type="submit">Add Car</button>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>