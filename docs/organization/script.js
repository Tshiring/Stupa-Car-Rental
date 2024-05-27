document
  .getElementById("car-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    // Get the form values
    const carImageInput = document.getElementById("car-image");
    const carName = document.getElementById("car-name").value;
    const carPrice = document.getElementById("car-price").value;
    const carMileage = document.getElementById("car-mileage").value;
    const carTransmission = document.getElementById("car-transmission").value;
    const carPeople = document.getElementById("car-people").value;
    const carElectric = document.getElementById("car-electric").value;

    // Get the image file and create a URL for it
    const carImageFile = carImageInput.files[0];
    const carImageURL = URL.createObjectURL(carImageFile);

    // Create a new car item element
    const carItem = document.createElement("div");
    carItem.className = "car-item";
    carItem.innerHTML = `
        <img src="${carImageURL}" alt="${carName}">
        <h3>${carName}</h3>
        <p>Price: ${carPrice}</p>
        <div class="car-details">
            <span>Mileage: ${carMileage}</span>
            <span>Transmission: ${carTransmission}</span>
            <span>People: ${carPeople}</span>
            <span>Electric: ${carElectric}</span>
        </div>
    `;

    // Append the new car item to the car grid
    document.getElementById("available-cars").appendChild(carItem);

    // Reset the form
    document.getElementById("car-form").reset();
  });
