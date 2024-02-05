document.addEventListener("DOMContentLoaded", function () {
  // Set minimum departure date to tomorrow
  var today = new Date();
  var tomorrow = new Date(today);
  tomorrow.setDate(tomorrow.getDate() + 1);
  var dd = String(tomorrow.getDate()).padStart(2, "0");
  var mm = String(tomorrow.getMonth() + 1).padStart(2, "0");
  var yyyy = tomorrow.getFullYear();
  tomorrow = yyyy + "-" + mm + "-" + dd;
  document.getElementById("departureDate").setAttribute("min", tomorrow);

  // Initialize the form with correct options
  updateDestinationOptions();
  updateOriginOptions();
});

// Prevent selecting the same city for origin and destination
function updateDestinationOptions() {
  var originSelect = document.getElementById("origin");
  var destinationSelect = document.getElementById("destination");
  var selectedOrigin = originSelect.value;

  for (var i = 0; i < destinationSelect.options.length; i++) {
    var option = destinationSelect.options[i];
    option.style.display = option.value === selectedOrigin ? "none" : "block";
  }
}

function updateOriginOptions() {
  var originSelect = document.getElementById("origin");
  var destinationSelect = document.getElementById("destination");
  var selectedDestination = destinationSelect.value;

  for (var i = 0; i < originSelect.options.length; i++) {
    var option = originSelect.options[i];
    option.style.display =
      option.value === selectedDestination ? "none" : "block";
  }
}
