<?php
session_start();
if (!isset($_SESSION["org"]) || $_SESSION["user_type"] != 'organization') {
    header("Location: ../403.php");
    exit();
}

include '../database.php';

if (isset($_POST["add"])) {
    if (isset($_FILES['car-image']) && $_FILES['car-image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/Car/uploads/'; // Use root directory path
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
        }
        $uploadFile = $uploadDir . basename($_FILES['car-image']['name']);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['car-image']['tmp_name'], $uploadFile)) {
            $imagePath = mysqli_real_escape_string($conn, 'uploads/' . basename($_FILES['car-image']['name']));
        } else {
            echo "Error uploading file.";
            exit();
        }
    } else {
        $imagePath = null;
    }

    $name = mysqli_real_escape_string($conn, $_POST["car-name"]);
    $price = mysqli_real_escape_string($conn, $_POST["car-price"]);
    $mileage = mysqli_real_escape_string($conn, $_POST["car-mileage"]);
    $transmission = mysqli_real_escape_string($conn, $_POST["car-transmission"]);
    $capacity = (int)$_POST["car-capacity"];
    $type = mysqli_real_escape_string($conn, $_POST["vehicle-type"]);

    $sql = "INSERT INTO cars (image, name, price, mileage, transmission, capacity, type) VALUES ('$imagePath', '$name', '$price', '$mileage', '$transmission', $capacity, '$type')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location:./car.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<?php require '../components/head.php'; ?>

<body>
    <div class=" org-car">
        <?php require './sidebar.php'; ?>
        <div class="main-content">
            <h1>Add New Car</h1>
            <div id="add-car" class="car-form">
                <form id="car-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                    <label for="car-image">Upload Car Image:</label>
                    <input type="file" id="car-image" name="car-image" accept="image/*">

                    <label for="car-name">Car Name:</label>
                    <input type="text" id="car-name" name="car-name">

                    <label for="car-price">Price:</label>
                    <input type="text" id="car-price" name="car-price">

                    <label for="car-mileage">Mileage:</label>
                    <input type="text" id="car-mileage" name="car-mileage">

                    <label for="car-transmission">Transmission:</label>
                    <select id="car-transmission" name="car-transmission">
                        <option value="">Select Transmission</option>
                        <option value="auto">Auto</option>
                        <option value="manual">Manual</option>
                    </select>

                    <label for="car-capacity">People Capacity:</label>
                    <input type="number" id="car-capacity" name="car-capacity">

                    <label for="vehicle-type">Type of Vehicle:</label>
                    <select id="vehicle-type" name="vehicle-type">
                        <option value="">Select Type of Vehicle</option>
                        <option value="electric">Electric</option>
                        <option value="fuel">Fuel</option>
                    </select>

                    <button type="submit" name="add">Add Car</button>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>