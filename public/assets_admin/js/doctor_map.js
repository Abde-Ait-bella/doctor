"use strict";

var lat = parseFloat($("#doc_lat").val());
var lng = parseFloat($("#doc_lang").val());
var markerss = [];
var bounds = null;
var map = null;

function initAutocomplete() {
    map = new google.maps.Map(document.getElementById("map-doc"), {
        // center: { lat: lat, lng: lng },
        // zoom: 8,
        maxZoom: 18,
        mapTypeId: "roadmap",
    });

    document.getElementById("doc_lat").value = "";
    document.getElementById("doc_lang").value = "";

    generateMarkers(markers);
}

function refreshBounds() {
    map.fitBounds(bounds);
    map.panToBounds(bounds);
}

function generateMarkers(data, clearMap = true) {
    var infoWindow = new google.maps.InfoWindow();

    if (clearMap) {
        console.log(markerss);
        bounds = new google.maps.LatLngBounds();
        markerss.forEach((marker) => {
            marker.setMap(null);
        });
    }

    markerss = data.map(function (item) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(item.lat, item.lng),
            icon: "/doctor/assets/image/marker.png",
        });
        marker.setMap(map);
        bounds.extend(marker.getPosition());

        google.maps.event.addListener(marker, "click", function () {

            if (infoWindow.getMap()) {
            infoWindow.close();
            } else {
            infoWindow.setContent(`
                        <div class="d-flex flex-column" style="max-height: 240px; height: 240px !importent;">
                        <a class="text-decoration-none" href="${
                            "doctor-profile/" + item.id + "/" + item["name"]
                        }" >
                        <div class="d-flex justify-content-center">
                        <img style="height: 130px; margin-bottom: 5px; border-radius: 10px;" src="${
                            item["image"]
                        }">
                        </div>
                            <h5 class="mt-1 mb-1 text-capitalize text-dark text-center">${
                                item.name
                            }</h5>
                            <div class="text-dark" style="max-width: 195px;">
                                <p class="mb-1 text-capitalize">${
                                    item["category"]
                                }</p>
                                <span></i> ${item.hpitalName}</span>
                                <div class="d-flex mt-1">
                                    <p class="mb-0 mt-1"><i class="fa-solid fa-location-dot"></i></p>
                                    <p class="text-wrap mb-1 mt-1 text-capitalize ms-2 text-secondary">  ${
                                        item.address
                                    }</p>
                                </div>
                            </div>
                        </div>
                        `);

                        console.log("markerOptions", infoWindow);
                        const infoWindowOpenOptions = {
                            map: map,
                            // shouldFocus: true,
                            anchor: marker,
                            };
                            infoWindow.open(infoWindowOpenOptions);

                            }

        });
        return marker;
    });

    map.fitBounds(bounds);
}
