let today = new Date();
let dateAfter6Days = new Date();
console.log(dateAfter6Days);


dateAfter6Days.setDate(today.getUTCDate() + 6);

let datesInBetween = [];
let daysName = [];
let currentDate = new Date(today);

while (currentDate <= dateAfter6Days) {
    let dateString = currentDate.toDateString();
    let dateParts = dateString.split(" ");
    dateParts.splice(0, 1);
    dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [
        dateParts[1],
        dateParts[0],
        dateParts[2],
    ];
    let formattedDate = dateParts.join(" ");

    let dayName = currentDate.toLocaleDateString('en-US', {
        weekday: "long",
    });

    datesInBetween.push(formattedDate);
    daysName.push(dayName);
    currentDate.setDate(currentDate.getDate() + 1);
}

datesInBetween.map((d, index) => {
    var htmlDate = `<span class="text-white">${d}</span>`;
    document.getElementById(`date_${index}`).innerHTML = htmlDate;
});


daysName.map((d, index) => {
    var htmlDays = `<span>${d}</span>`;
    var htmlTime = "";
    doctorWorkHour.map((w) => {
        if (d == w.day_index) {
            period = JSON.parse(w.period_list);
            var i = 0;
            while (period[i]) {
                for (
                    let time = parseInt(period[i]["start_time"].split(":")[0]);
                    time < parseInt(period[i]["end_time"].split(":")[0]);
                    time++
                ) {
                    htmlTime += `<div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                        <input type="hidden" class="btn_time" id="btn_time" date="${datesInBetween[index]}" value="${time}:00">${time}:00 AM</input>
                    </div>`;
                }
                i += 1;
            }
        }
    });
    document.getElementById(`day_${index}`).innerHTML = htmlDays;
    document.getElementById(`times-btns_${index}`).innerHTML = htmlTime;
    const div = document.getElementById(`times-btns_${index}`);
    if (div.innerHTML.trim() === "") {
        div.innerHTML = `
        <div class="timing-empty border rounded d-flex align-items-center mb-2" onclick="Time(this)">
            <input type="hidden" disabled id="btn_time" date="" value="">Unavailable</input>
        </div>
        <div class="timing-empty border rounded d-flex align-items-center mb-2" onclick="Time(this)">
            <input type="hidden" disabled id="btn_time" date="" value="">Unavailable</input>
        </div>
        <div class="timing-empty border rounded d-flex align-items-center mb-2" onclick="Time(this)">
            <input type="hidden" disabled id="btn_time" date="" value="">Unavailable</input>
        </div>
        `;
    }
});

function arrowRight() {
    today.setDate(today.getDate() + 7);
    var todayCopy = new Date(today.valueOf());

    let dateString = todayCopy.toDateString();
    let dateParts = dateString.split(" ");
    dateParts.splice(0, 1);
    dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [
        dateParts[1],
        dateParts[0],
        dateParts[2],
    ];
    let formattedDate = dateParts.join(" ");
    let datesInBetween = [formattedDate];

    for (var i = 0; i < 6; i++) {
        let dateString = todayCopy.toDateString();
        let dateParts = dateString.split(" ");
        dateParts.splice(0, 1);
        dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [
            dateParts[1],
            dateParts[0],
            dateParts[2],
        ];
        let formattedDate = dateParts.join(" ");

        todayCopy.setDate(todayCopy.getDate() + 1);
        datesInBetween.push(formattedDate);
    }

    datesInBetween.map((d, index) => {
        var htmlDays = `<span class="text-white" >${d}</span>`;
        document.getElementById(`date_${index}`).innerHTML = htmlDays;
    });

    daysName.map((d, index) => {
        var htmlTime = "";
        doctorWorkHour.map((w) => {
            if (d == w.day_index) {
                period = JSON.parse(w.period_list);
                // console.log( period[0]['start_time'].split(':')[0] )
                // console.log( period[0]['end_time'].split(':')[0] )
                // console.log( JSON.parse(w.period_list)[0]['end_time'].split(':')[0])
                var i = 0;
                while (period[i]) {
                    for (
                        let time = parseInt(
                            period[i]["start_time"].split(":")[0]
                        );
                        time < parseInt(period[i]["end_time"].split(":")[0]);
                        time++
                    ) {
                        htmlTime += `<div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                            <input type="hidden" class="btn_time" id="btn_time" date="${datesInBetween[index]}" value="${time}:00">${time}:00 AM</input>
                        </div>`;
                    }
                    i += 1;
                }
            }
        });

        document.getElementById(`times-btns_${index}`).innerHTML = htmlTime;

        const div = document.getElementById(`times-btns_${index}`);
        if (div.innerHTML.trim() === "") {
            div.innerHTML = `
            <div class="timing-empty border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                <input type="hidden" disabled id="btn_time" date="" value="">Unavailable</input>
            </div>
            <div class="timing-empty border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                <input type="hidden" disabled id="btn_time" date="" value="">Unavailable</input>
            </div>
            <div class="timing-empty border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                <input type="hidden" disabled id="btn_time" date="" value="">Unavailable</input>
            </div>
            `;
        }
    });
}

function arrowLeft() {
    today.setDate(today.getDate() - 7);
    var todayCopy = new Date(today.valueOf());

    let dateString = todayCopy.toDateString();
    let dateParts = dateString.split(" ");
    dateParts.splice(0, 1);
    dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [
        dateParts[1],
        dateParts[0],
        dateParts[2],
    ];
    let formattedDate = dateParts.join(" ");
    let datesInBetween = [formattedDate];

    for (var i = 0; i < 6; i++) {
        let dateString = todayCopy.toDateString();
        let dateParts = dateString.split(" ");
        dateParts.splice(0, 1);
        dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [
            dateParts[1],
            dateParts[0],
            dateParts[2],
        ];
        let formattedDate = dateParts.join(" ");

        todayCopy.setDate(todayCopy.getDate() + 1);
        datesInBetween.push(formattedDate);
    }

    datesInBetween.map((d, index) => {
        var htmlDays = `<span class="text-white">${d}</span>`;
        document.getElementById(`date_${index}`).innerHTML = htmlDays;

        daysName.map((d, index) => {
            var htmlTime = "";
            doctorWorkHour.map((w) => {
                if (d == w.day_index) {
                    period = JSON.parse(w.period_list);
                    var i = 0;
                    while (period[i]) {
                        for (
                            let time = parseInt(
                                period[i]["start_time"].split(":")[0]
                            );
                            time <
                            parseInt(period[i]["end_time"].split(":")[0]);
                            time++
                        ) {
                            htmlTime += `<div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                                <input type="hidden" class="btn_time" id="btn_time" date="${datesInBetween[index]}" value="${time}:00">${time}:00 AM</input>
                            </div>`;
                        }
                        i += 1;
                    }
                }
            });

            document.getElementById(`times-btns_${index}`).innerHTML = htmlTime;

            const div = document.getElementById(`times-btns_${index}`);
            if (div.innerHTML.trim() === "") {
                div.innerHTML = `
                <div class="timing-empty border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                    <input type="hidden" disabled id="btn_time" date="" value="">Unavailable</input>
                </div>
                <div class="timing-empty border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                    <input type="hidden" disabled id="btn_time" date="" value="">Unavailable</input>
                </div>
                <div class="timing-empty border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                    <input type="hidden" disabled id="btn_time" date="" value="">Unavailable</input>
                </div>
                `;
            }
        });
    });
}

function Time(elem) {
    var btn = document.getElementsByClassName("timing");
    for (i = 0; i < btn.length; i++) {
        btn[i].classList.remove("selected");
    }

    elem.classList.add("selected");
    window.dateValue = elem.firstElementChild.getAttribute("date");
    window.timeValue = elem.firstElementChild.value;
    document.getElementById("time").value = elem.firstElementChild.value;

    const date = new Date(elem.firstElementChild.getAttribute("date"));

    // Extract the year, month, and day from the Date object
    const year = date.getFullYear();
    const month = ("0" + (date.getMonth() + 1)).slice(-2); // Months are zero-indexed
    const day = ("0" + date.getDate()).slice(-2);

    // Assemble the reversed date string in the "YYYY-MM-DD" format
    const reversedDateString = `${year}-${month}-${day}`;

    document.getElementById("date").value = reversedDateString;
}

