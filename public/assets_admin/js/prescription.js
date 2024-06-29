function pop_up() {
    const popup = document.getElementById("popup");
    console.log(popup);
    popup.classList.add("active");

    const popup_overlay = document.getElementById("popup-overlay");
    console.log(popup_overlay);
    popup_overlay.classList.add("active");
}

function close_popup() {
    const popup = document.getElementById("popup");
    console.log(popup);
    popup.classList.remove("active");

    const popup_overlay = document.getElementById("popup-overlay");
    console.log(popup_overlay);
    popup_overlay.classList.remove("active");
}

function sendMedicines() {
    var formData = new FormData($("#medicinForm")[0]);
    // console.log(formData);
    // console.log('result.success');

    // fetch("addMedicines", {
    //     method: 'POST',
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
    //         'Accept': 'application/json'
    //     },
    //     body: formData


    // })
    // .then(response =>
    //     {
    //         console.log(response.json())
    //         if(response.status == 200){
    //             document.getElementById('medicine_category').innerHTML = `<p>200</p>`;
    //         }
    //     })
    // .then(data => {
    //     console.log(data)
    // })
    // .catch(error => {
    //     console.error('Error:', error);
    //     document.getElementById('medicine_category').innerHTML = `<p>error</p>`;
    // });

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        url: base_url + "/addMedicines",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            console.log('result', result);
            if (result.success == true) {

                var select =  document.getElementById("medicine_select");
                const newOption = document.createElement('option');
                
                newOption.value = parseInt(result.id);

                const name = result.name.charAt(0).toUpperCase() + result.name.slice(1);

                newOption.text = name
                select.add(newOption);
                Swal.fire({
                    icon: "success",
                    title: "Add medicine avec succès",
                    showConfirmButton: false,  // Hide the "OK" button
                    timer: 2000
                });
                close_popup();
            }
        },
        error: function (err) {
            Swal.fire({
                title: "Oops...",
                text: "Something is wrong",
            });
        },
    });
}
