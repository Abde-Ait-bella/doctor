"use strict";


var lat = parseFloat($('#doc_lat').val());
var lng = parseFloat($('#doc_lang').val());
var markerss = markers

function initAutocomplete() {

    const map = new google.maps.Map(document.getElementById("map-doc")
        , {
            center: { lat: lat, lng: lng },
            zoom: 13,
            mapTypeId: "roadmap",
        });

    const markerOptions = markerss.map((m) => ({
        position: new google.maps.LatLng(m.lat, m.lng),
        icon: 'http://localhost/doctor/assets/image/marker.png'
    }));


    // const markerOptions = {
    //     position : new google.maps.LatLng(lat, lng),
    //     icon: 'http://localhost/doctor/assets/image/marker.png',
    // }

    // const markerOptions01 = {
    //     position : new google.maps.LatLng(30.3917567, -9.2175988),
    //     icon: 'http://localhost/doctor/assets/image/marker.png',
    // }

    // const markerOptions02 = {
    //     position : new google.maps.LatLng(30.471625, -8.8701815),
    //     icon: 'http://localhost/doctor/assets/image/marker.png',
    // }

    // const markerOptions03 = {
    //     position : new google.maps.LatLng(30.4707265, -8.8934945),
    //     icon: 'http://localhost/doctor/assets/image/marker.png',
    // }

    // const markerOptions04 = {
    //     position : new google.maps.LatLng(30.4660505, -8.8783239),
    //     icon: 'http://localhost/doctor/assets/image/marker.png',
    // }

    const marker =
        markerOptions.map((mark) => (
            new google.maps.Marker(mark)
        ))

    console.log('markerOptions', marker)

    // const marker01 = new google.maps.Marker(markerOptions01)
    // const marker02 = new google.maps.Marker(markerOptions02)
    // const marker03 = new google.maps.Marker(markerOptions03)
    // const marker04 = new google.maps.Marker(markerOptions04)

    // marker.addListener('click', () => {
    //     document.getElementById('info').innerHTML = 'kkkk';
    // })

    marker.map((m) => {
        m.setMap(map)
    })
    // marker01.setMap(map)
    // marker02.setMap(map)
    // marker03.setMap(map)
    // marker04.setMap(map)


    // const a = new google.maps.Marker({
    //     position: {
    //         lat: lat,
    //         lng: lng
    //     },
    //     map,

    // });

    const input = document.getElementById("pac-input");
    const searchBox = new google.maps.places.SearchBox(input);
    map.addListener("bounds_changed", () => {
        searchBox.setBounds(map.getBounds());
    });

    let markers = [];

    searchBox.addListener("places_changed", () => {
        const places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }
        // a.setMap(null)
        markers.forEach((marker) => {
            marker.setMap(null);
        });
        markers = [];

        const bounds = new google.maps.LatLngBounds();
        places.forEach((place) => {
            if (!place.geometry || !place.geometry.location) {
                return;
            }
            const icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25),
            };
            $('#doc_lat').val(place.geometry.location.lat().toFixed(5));
            $('#doc_lat').val(place.geometry.location.lng().toFixed(5));
            // Create a marker for each place.
            markers.push(
                new google.maps.Marker({
                    map,
                    icon,
                    title: place.name,
                    position: place.geometry.location,
                })
            );

            if (place.geometry.viewport) {

                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}
