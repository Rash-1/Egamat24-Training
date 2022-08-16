let formElement = document.querySelector('.formElement');
let submitButton = document.querySelector('.submitButton');
let exitSection = document.querySelector('#exit');
let entrySection = document.querySelector('#entry');
let entryHour = document.querySelector('.entryHourInput')
let entryMinute = document.querySelector('.entryMinuteInput')
let exitHour = document.querySelector('.exitHourInput')
let exitMinute = document.querySelector('.exitMinuteInput')



let currentYear = '';
let currentMonth = '';
let currentDay = '';
let currentHour = '';
let currentMinute = '';
let currentSecond = '';

let formattedDate = '';
let formattedTime = '';

let reports = []

submitButton.addEventListener('click',() =>{
    let currentDate = new Date();
    let entryTime = entryHour.value + ':' + entryMinute.value;
    let exitTime = exitHour.value + ':' + exitMinute.value;
    let report = {
        Date:{
            Entry:'',
            Exit:''
        }
    }
    reports = JSON.parse(localStorage.getItem('reports'))


    currentYear = currentDate.getFullYear();
    currentMonth = currentDate.getMonth();
    currentDay = currentDate.getDate();

    formattedDate = ' ' + currentYear + '/' + currentMonth + '/' + currentDay ;
    report[formattedDate] = report.Date;
    delete report.Date;
    report[formattedDate].Entry = entryTime;
    report[formattedDate].Exit = exitTime;
    reports.push(report)
    localStorage.removeItem('reports')
    localStorage.setItem('reports',JSON.stringify(reports))
    console.log(true)
 })
