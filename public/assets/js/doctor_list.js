var base_url = $("input[name=base_url]").val();

$(document).ready(function () {
    var page = 1;
    $("#more-doctor").click(function () {
        page++;
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "?page=" + page,
            type: "post",
        })
            .done(function (data) {
                if (data.meta.current_page == data.meta.last_page) {
                    $("#more-doctor").hide();
                } else {
                    $("#more-doctor").show();
                }
                $(".dispDoctor").append(data.html);
                generateMarkers(data.markers, false);
            })
            .fail(function (jqXHR, ajaxOptions, throwError) {
                alert("Server error");
            });
    });

    $("#filter_form").change(function () {
        var categories = [];
        var gender = $('input[name="gender_type"]:checked').val();
        var sort_by = $("select[name=sort_by]").val();
        $('input[name="select_specialist"]:checked').each(function (i) {
            if (categories.indexOf(this.value) === -1) {
                categories.push(this.value);
            }
        });

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: {
                category: categories,
                gender_type: gender,
                sort_by: sort_by,
                from: "js",
            },
            url: base_url + "/show-doctors",
            success: function (result) {
                $(".dispDoctor").html("");
                $(".dispDoctor").append(result.html);
                $(".myDrop").toggleClass("show");
                $("#more-doctor").hide();
                categories.length = 0;

                generateMarkers(result.markers);

            },
            error: function (err) {
                console.log("err");
            },
        });
    });
});

function geolocate() {
    var autocomplete = new google.maps.places.Autocomplete(
        /** @type {HTMLInputElement} */ (
            document.getElementById("autocomplete")
        ),
        { types: ["geocode"] }
    );

    // var autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')), {
    //     componentRestrictions: { country: ["us", "ca"] },
    //     fields: ["address_components", "geometry"],
    //     types: ["address"],
    // });

    google.maps.event.addListener(autocomplete, "place_changed", function () {
        var lat = autocomplete.getPlace().geometry.location.lat();
        var lang = autocomplete.getPlace().geometry.location.lng();
        $("input[name=doc_lat]").val(lat);
        $("input[name=doc_lang]").val(lang);
    });
}

function clearInput() {
    setTimeout(() => {
        document.getElementById("doc_lat").value = "";
        document.getElementById("doc_lang").value = "";
    }, 1000);
}

function searchDoctor() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: base_url + "/show-doctors",
        type: "post",
        data: $("#searchForm").serialize(),
        success: function (result) {
            $(".dispDoctor").html("");
            $(".dispDoctor").removeClass("dispDoctor");
            $(".dispDoctor").append(result.html);
            $("#more-doctor").hide();

        },
        error: function (err) {},
    });
}

function type_grid() {
    var parent = document.getElementById("dispDoctor");
    var div_liste = document.querySelectorAll("#doc-liste");
    var div_grid = document.querySelectorAll("#doc-grid");
    var btn_List = document.getElementById("type_Liste");
    var btn_grid = document.getElementById("type_grid");

    parent.classList.remove("flex-column", "ps-1");
    parent.classList.add("d-flex", "px-3");

    div_liste.forEach((element) => {
        element.className = "hidden";
    });

    div_grid.forEach((element) => {
        element.classList.remove("hidden");
        element.classList.add("block");
    });

    btn_List.classList.remove("active");
    btn_grid.classList.add("active");
}

function type_Liste() {
    var parent = document.getElementById("dispDoctor");
    var div_liste = document.querySelectorAll("#doc-liste");
    var div_grid = document.querySelectorAll("#doc-grid");
    var btn_List = document.getElementById("type_Liste");
    var btn_grid = document.getElementById("type_grid");

    parent.classList.add("flex-column", "ps-1");
    parent.classList.remove("d-flex", "px-3");

    div_liste.forEach((element) => {
        element.className = "block";
    });

    div_grid.forEach((element) => {
        element.classList.remove("block");
        element.classList.add("hidden");
    });

    btn_grid.classList.remove("active");
    btn_List.classList.add("active");
}

function type_maps() {
    var container = document.getElementById("container");
    var btn_maps = document.getElementById("type_maps");
    var form = document.getElementById("form");
    var map_doc = document.getElementById("maps-doctors");
    var div_grid = document.querySelectorAll("#doc-grid");

    container.classList.toggle("container");
    btn_maps.classList.toggle("active");
    form.classList.toggle("hidden");
    // map_doc.classList.toggle("block");

    $('#maps-doctors').toggle(function(){
    google.maps.event.trigger(map, 'resize');
    refreshBounds();
  });

    div_grid.forEach((elem) => {
        elem.classList.toggle("col-md-6");
    });


    // var   div_liste   =    document.querySelectorAll('#doc-liste');
}
