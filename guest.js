function displayInfo(
  imageSrc,
  productName,
  productType,
  productDescription,
  vendorName,
  vendorContact,
  vendorEmail
) {
  var infoWindow = window.open("", "Item Info", "width=600,height=600");
  infoWindow.document.write(
    "<img src='" + imageSrc + "' width='400' height='400'><br>"
  );
  infoWindow.document.write(
    "<strong>Product's Name:</strong> " + productName + "<br>"
  );
  infoWindow.document.write(
    "<strong>Product's Type:</strong> " + productType + "<br>"
  );
  infoWindow.document.write(
    "<strong>Product's Description:</strong> " + productDescription + "<br>"
  );
  infoWindow.document.write(
    "<strong>Vendor's Name:</strong> " + vendorName + "<br>"
  );
  infoWindow.document.write(
    "<strong>Vendor's Contact:</strong> " + vendorContact + "<br>"
  );
  infoWindow.document.write(
    "<strong>Vendor's Email:</strong> " + vendorEmail + "<br>"
  );
}


function searchItems() {
  const searchInput = document.getElementById("search").value.toLowerCase();
  const typeInput = document.getElementById("type").value.toLowerCase();
  const manufacturerInput = document
    .getElementById("manufacturer")
    .value.toLowerCase();
  const priceRangeInput = document
    .getElementById("price-range")
    .value.replace(/\$/g, ""); // remove dollar sign from price range input

  const items = document.getElementsByClassName("item");

  for (let i = 0; i < items.length; i++) {
    const item = items[i];
    const name = item.getAttribute("data-name").toLowerCase();
    const type = item.getAttribute("data-type").toLowerCase();
    const manufacturer = item.getAttribute("data-manufacturer").toLowerCase();
    const price = parseFloat(
      item.getAttribute("data-price").replace(/\$/g, "")
    ); // extract numeric value from data-price attribute

    const nameMatch = name.includes(searchInput);
    const typeMatch = type.includes(typeInput) || typeInput === "";
    const manufacturerMatch =
      manufacturer.includes(manufacturerInput) || manufacturerInput === "";
    const priceMatch =
      priceRangeInput === "" ||
      (priceRangeInput === "$40+" && price >= 40) ||
      (priceRangeInput !== "$40+" &&
        price >= parseFloat(priceRangeInput.split("-")[0]) &&
        price <= parseFloat(priceRangeInput.split("-")[1]));

    if (nameMatch && typeMatch && manufacturerMatch && priceMatch) {
      item.style.display = "";
    } else {
      item.style.display = "none";
      continue;
    }
  }
  // reset filter values
  document.getElementById("search").value = "";
  document.getElementById("type").value = "";
  document.getElementById("manufacturer").value = "";
  document.getElementById("price-range").value = "";
}