let formElement = document.querySelector('.formElement');
let submitButton = document.querySelector('.submitButton');
let exitSection = document.querySelector('#exit');
let entrySection = document.querySelector('#entry');
let entryHour = document.querySelector('.entryHourInput')
let entryMinute = document.querySelector('.entryMinuteInput')
let exitHour = document.querySelector('.exitHourInput')
let exitMinute = document.querySelector('.exitMinuteInput')
let reportsTableSection = document.querySelector('.reportsTableSection')
let reportsTable = document.querySelector('.reportsTable')
let massageSection = document.querySelector('.massageSection')
let massage = document.querySelector('.massage')


let currentYear = '';
let currentMonth = '';
let currentDay = '';
let currentHour = '';
let currentMinute = '';
let currentSecond = '';

let formattedDate = '';
let formattedTime = '';

let reports = []

if (localStorage.getItem('reports') != null) {
    createReportsTable()
    addReportsTableRows()
    reportsTableSection.classList.remove('hidden')
}

function store(){
    createReportsTable();
    let currentDate = new Date();
    let entryTime = entryHour.value + ':' + entryMinute.value;
    let exitTime = exitHour.value + ':' + exitMinute.value;
    let report = {
        Date:'',
        Entry:'',
        Exit:''

    }

    if (localStorage.getItem('reports') != null){
        reports = JSON.parse(localStorage.getItem('reports'))
    }

    currentYear = currentDate.getFullYear();
    currentMonth = currentDate.getMonth();
    currentDay = currentDate.getDate();

    formattedDate = ' ' + currentYear + '/' + currentMonth + '/' + currentDay ;
    report.Date = formattedDate;
    report.Entry = entryTime;
    report.Exit = exitTime;
    reports.push(report)
    localStorage.removeItem('reports')
    localStorage.setItem('reports',JSON.stringify(reports))
    addReportsTableRows();
}
function createReportsTable() {
    reportsTableSection.innerHTML = "<table class=\"reportsTable\">\n" +
        "            <thead>\n" +
        "            <tr>\n" +
        "                <th>Date</th>\n" +
        "                <th>Entry</th>\n" +
        "                <th>Exit</th>\n" +
        "            </tr>\n" +
        "            </thead>\n" +
        "            <tbody class='tableBody'></tbody>\n" +
        "        </table>"
    ;

}
function addReportsTableRows(){
    let reportsData = JSON.parse(localStorage.getItem('reports'))
    let tableBody = document.querySelector('.tableBody')
    reportsData.forEach(data => {

        let dataTr = document.createElement('tr');
        let dateTd = document.createElement('td')
        dateTd.className = 'date';
        let entryTd = document.createElement('td')
        entryTd.className = 'tableEntry';
        let exitTd = document.createElement('td')
        exitTd.className = 'tableExit';
        dataTr.appendChild(dateTd)
        dataTr.appendChild(entryTd)
        dataTr.appendChild(exitTd)

        dateTd.innerText = data.Date;
        entryTd.innerText = data.Entry
        exitTd.innerText = data.Exit;

        tableBody.appendChild(dataTr)
    })
}
function addFakeRows(number){
    for (let i = 0; i <number ; i++) {
        createReportsTable()
        store();
        addReportsTableRows();
    }
}
function validateHour(hour){
    return !(hour > 23 )
}
function validateMinute(minute){
    return !(minute > 59);

}


submitButton.addEventListener("click",() =>{
    if ( validateHour(exitHour.value) && validateMinute(exitMinute.value) && validateHour(entryHour.value) && validateMinute(entryMinute.value)){
        reportsTableSection.classList.remove('hidden')
        if (reportsTable != null){
            createReportsTable();
            store()
            addReportsTableRows();
        }
        store()
        createReportsTable()
        addReportsTableRows()
    }

    massageSection.classList.remove('hidden')
    let massageText = 'Please Enter A Valid'
    if (!validateHour(entryHour.value || !validateHour(exitHour))){
        massage.innerText = massageText + ' Hour'
    }
    if (!validateMinute(entryMinute.value || !validateMinute(exitMinute))){
        massage.innerText = massageText + ' Minute'
    }
})

// addFakeRows(1000)

