"use strict";

var lat = parseFloat($("#doc_lat").val());
var lng = parseFloat($("#doc_lang").val());
var markerss = markers;

function initAutocomplete() {
    const map = new google.maps.Map(document.getElementById("map-doc"), {
        center: { lat: lat, lng: lng },
        zoom: 8,
        mapTypeId: "roadmap",
    });

    const infoWindow = new google.maps.InfoWindow();
    console.log(markerss);

    markerss = markerss.map(function (item) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(item.lat, item.lng),
            icon: "http://localhost/doctor_test/doctor/assets//image/marker.png",
        });
        marker.setMap(map);
        google.maps.event.addListener(marker, "click", function () {
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
                <div class="text-dark">
                    <p class="mb-1 text-capitalize">${item["category"]}</p>
                    <span></i> ${item.hpitalName}</span>
                    <div class="d-flex mt-1">
                        <p class="mb-0 mt-1"><i class="fa-solid fa-location-dot"></i></p>
                        <p class="text-wrap mb-1 mt-1 text-capitalize ms-2 text-secondary" style="width: 156px;">  ${
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
        });
    });

    // const marker04 = new google.maps.Marker(markerOptions04)

    // marker.addListener('click', () => {
    //     document.getElementById('info').innerHTML = 'kkkk';
    // })

    // const infoWindowOptions = {
    //     position: { lat: 30.4737131, lng: -8.8759107 },
    //     pixelOffset: new google.maps.Size(0, -43),
    //     maxWidth: 200
    // };

    //infoWindow.open(infoWindowOpenOptions);

    // const a = new google.maps.Marker({
    //     position: {
    //         lat: lat,
    //         lng: lng
    //     },
    //     map,

    // });
    // const input = document.getElementById("pac-input");

    // const searchBox = new google.maps.places.SearchBox(input);
    // map.addListener("bounds_changed", () => {
    //     searchBox.setBounds(map.getBounds());
    // });

    // let markers = [];

    // searchBox.addListener("places_changed", () => {
    //     const places = searchBox.getPlaces();

    //     if (places.length == 0) {
    //         return;
    //     }
    //     // a.setMap(null)
    //     markers.forEach((marker) => {
    //         marker.setMap(null);
    //     });
    //     markers = [];

    //     const bounds = new google.maps.LatLngBounds();
    //     places.forEach((place) => {
    //         if (!place.geometry || !place.geometry.location) {
    //             return;
    //         }
    //         const icon = {
    //             url: place.icon,
    //             size: new google.maps.Size(71, 71),
    //             origin: new google.maps.Point(0, 0),
    //             anchor: new google.maps.Point(17, 34),
    //             scaledSize: new google.maps.Size(25, 25),
    //         };
    //         $('#doc_lat').val(place.geometry.location.lat().toFixed(5));
    //         $('#doc_lat').val(place.geometry.location.lng().toFixed(5));
    //         // Create a marker for each place.
    //         markers.push(
    //             new google.maps.Marker({
    //                 map,
    //                 icon,
    //                 title: place.name,
    //                 position: place.geometry.location,
    //             })
    //         );

    //         if (place.geometry.viewport) {

    //             bounds.union(place.geometry.viewport);
    //         } else {
    //             bounds.extend(place.geometry.location);
    //         }
    //     });
    //     map.fitBounds(bounds);
    // });
}
