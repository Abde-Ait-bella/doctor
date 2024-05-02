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

    const markerOptions = markerss.map((m) => ({
        position: new google.maps.LatLng(m.lat, m.lng),
        icon: "http://localhost/doctor_test/doctor/assets/image/marker.png",
    }));

    const marker = markerOptions.map((mark) => new google.maps.Marker(mark));

    console.log("markerOptions", marker);

    // const marker04 = new google.maps.Marker(markerOptions04)

    // marker.addListener('click', () => {
    //     document.getElementById('info').innerHTML = 'kkkk';
    // })

    marker.map((m) => {
        m.setMap(map);
    });

    $("#doc_lat").val("");
    $("#doc_lang").val("");

    const infoWindowOptions = {
        position: { lat: 30.4737131, lng: -8.8759107 },
        pixelOffset: new google.maps.Size(0, -43),
        maxWidth: 200
    };

    const infoWindow = new google.maps.InfoWindow(infoWindowOptions);

    infoWindow.setContent(`
    <div class="d-flex flex-column text-center">
    <img style="height: 130px; margin-bottom: 8px;" src="http://localhost/doctor_test/doctor/assets/image/ensemble-simple-dicône-de-tête-dhomme.webp">
        <h4>abdessamad</h4>
        <span>Elmoukhtar ssousi</span>
    </div>
    `)

    const infoWindowOpenOptions = {
        map: map,
        // shouldFocus: true,
        anchor: marker,
    };

    infoWindow.open(infoWindowOpenOptions);

    // const a = new google.maps.Marker({
    //     position: {
    //         lat: lat,
    //         lng: lng
    //     },
    //     map,

    // });
    const input = document.getElementById("pac-input");

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
