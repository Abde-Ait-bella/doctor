let today = new Date();


let dateAfter6Days = new Date();
dateAfter6Days.setDate(today.getUTCDate() + 6);

let datesInBetween = [];
let daysName = [];
let currentDate = new Date(today);


while (currentDate <= dateAfter6Days) {
    let dateString = currentDate.toDateString();
    let dateParts = dateString.split(" ");
    dateParts.splice(0, 1);
    dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [dateParts[1], dateParts[0], dateParts[2]]
    let formattedDate = dateParts.join(" ");

    let dayName = currentDate.toLocaleDateString('fr-FR', { weekday: 'long' })


    datesInBetween.push(formattedDate);
    daysName.push(dayName)
    currentDate.setDate(currentDate.getDate() + 1);
}

console.log("Dates in between:");
console.log(daysName);

let times = ["09:00", "10:00", "11:00"]

datesInBetween.map((d, index) => {
    var htmlDate = `<span>${d}</span>`
    document.getElementById(`date_${index}`).innerHTML = htmlDate;
    var htmlTime = `
            <div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                <input type="hidden" class="btn_time" id="btn_time" date="${d}" value="09:00 am">09:00 AM</input>
            </div>
            <div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                <input type="hidden" class="btn_time" id="btn_time" date="${d}" value="10:00 am">10:00 AM</input>
            </div>
            <div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                <input type="hidden" class="btn_time" id="btn_time" date="${d}" value="11:00 am">11:00 AM</input>
            </div>
            `
    document.getElementById(`times-btns_${index}`).innerHTML = htmlTime;
})

daysName.map((d, index) => {
    var htmlDays = `<span>${d}</span>`
    // var htmlTime =  `<input type="hidden" class="btn_time" id="btn_time" value="09:00">09:00 AM</input>`
    document.getElementById(`day_${index}`).innerHTML = htmlDays;
    // document.getElementById(`timing`).innerHTML = htmlTime;
})

function arrowRight() {

    today.setDate(today.getDate() + 7)
    var todayCopy = new Date(today.valueOf());
    console.log('today', today, 'todayCopy', todayCopy)


    let dateString = todayCopy.toDateString();
    let dateParts = dateString.split(" ");
    dateParts.splice(0, 1);
    dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [dateParts[1], dateParts[0], dateParts[2]]
    let formattedDate = dateParts.join(" ");
    let datesInBetween = [formattedDate];

    for (var i = 0; i < 6; i++) {

        let dateString = todayCopy.toDateString();
        let dateParts = dateString.split(" ");
        dateParts.splice(0, 1);
        dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [dateParts[1], dateParts[0], dateParts[2]]
        let formattedDate = dateParts.join(" ");

        todayCopy.setDate(todayCopy.getDate() + 1);
        datesInBetween.push(formattedDate);
    }

    datesInBetween.map((d, index) => {
        var htmlDays = `<span>${d}</span>`
        document.getElementById(`date_${index}`).innerHTML = htmlDays;

        var htmlTime = `
        <div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
        <input type="hidden" class="btn_time" id="btn_time" date="${d}" value="09:00">09:00 AM</input>
    </div>
    <div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
        <input type="hidden" class="btn_time" id="btn_time" date="${d}" value="10:00">10:00 AM</input>
    </div>
    <div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
        <input type="hidden" class="btn_time" id="btn_time" date="${d}" value="11:00">11:00 AM</input>
    </div>
`
        document.getElementById(`times-btns_${index}`).innerHTML = htmlTime;

    })
}

function arrowLeft() {

    today.setDate(today.getDate() - 7)
    var todayCopy = new Date(today.valueOf());


    let dateString = todayCopy.toDateString();
    let dateParts = dateString.split(" ");
    dateParts.splice(0, 1);
    dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [dateParts[1], dateParts[0], dateParts[2]]
    let formattedDate = dateParts.join(" ");
    let datesInBetween = [formattedDate];

    for (var i = 0; i < 6; i++) {

        let dateString = todayCopy.toDateString();
        let dateParts = dateString.split(" ");
        dateParts.splice(0, 1);
        dateParts = [dateParts[0], dateParts[1], dateParts[2]] = [dateParts[1], dateParts[0], dateParts[2]]
        let formattedDate = dateParts.join(" ");

        todayCopy.setDate(todayCopy.getDate() + 1);
        datesInBetween.push(formattedDate);
    }

    datesInBetween.map((d, index) => {
        var htmlDays = `<span>${d}</span>`
        document.getElementById(`date_${index}`).innerHTML = htmlDays;

        var htmlTime = `
        <div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
            <input type="hidden" class="btn_time" id="btn_time" date="${d}" value="09:00">09:00 AM</input>
        </div>
        <div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
            <input type="hidden" class="btn_time" id="btn_time" date="${d}" value="10:00">10:00 AM</input>
        </div>
        <div class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
            <input type="hidden" class="btn_time" id="btn_time" date="${d}" value="11:00">11:00 AM</input>
        </div>
`
        document.getElementById(`times-btns_${index}`).innerHTML = htmlTime;

    })
}

function Time(elem) {

    var btn = document.getElementsByClassName('timing')
    for (i = 0; i < btn.length; i++) {
        btn[i].classList.remove('selected');
    }

    elem.classList.add('selected');
    console.log(elem.firstElementChild.getAttribute("date"))
    document.getElementById('time').value = elem.firstElementChild.value

    const date = new Date(elem.firstElementChild.getAttribute("date"));

    // Extract the year, month, and day from the Date object
    const year = date.getFullYear();
    const month = ('0' + (date.getMonth() + 1)).slice(-2); // Months are zero-indexed
    const day = ('0' + date.getDate()).slice(-2);

    // Assemble the reversed date string in the "YYYY-MM-DD" format
    const reversedDateString = `${year}-${month}-${day}`;


    document.getElementById('date').value = reversedDateString

}

function infoPerso(){
    // let name =  document.getElementById('patient-name').value;
    // let phone =  document.getElementById('phone').value;


    console.log(phone)
}

