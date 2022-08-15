/*
* Elements
*/

let selectedDate = document.querySelector(".selected-date");
let Cl_month_section = document.querySelector('.month');
let Cl_year_section = document.querySelector('.year');
let Cl_days_section = document.querySelector('.days');
let Cl_days = Cl_days_section.children;
let nArrow = document.querySelector('.next-month');
let pArrow = document.querySelector('.previous-month');

/*
* Calendar PopUp
 */

selectedDate.addEventListener("click",() =>{
    document.querySelector(".calendar").classList.toggle('hidden')
})

/*
* Current Date in AD
*/

let _Date = new Date();
let currentYear = _Date.getFullYear();
let currentMonth = _Date.getMonth();
let currentDay = _Date.getDate();

/*
* Current Date in Jalali
*/

let currentDate_ja = gregorian_to_jalali(currentYear,currentMonth +1, currentDay);

let currentJA_Year = currentDate_ja[0]
let currentJA_Month = currentDate_ja[1]
let currentJA_Day = currentDate_ja[2]
/*
* Months And Their Days Count
*/

const monthsInfo = {
    1 : {
        name : 'Farvardin',
        days : 31,
    },
    2 : {
        name : 'Ordibehesht',
        days : 31,
    },
    3 : {
        name : 'Khordad',
        days : 31,
    },
    4 : {
        name : 'Tir',
        days : 31,
    },
    5 : {
        name : 'Mordad',
        days : 31,
    },
    6 : {
        name : 'Shahrivar',
        days : 31,
    },
    7 : {
        name : 'Mehr',
        days : 30,
    },
    8 : {
        name : 'Aban',
        days : 30,
    },
    9 : {
        name : 'Azar',
        days : 30,
    },
    10 : {
        name : 'Dey',
        days : 30,
    },
    11 : {
        name : 'Bahman',
        days : 30,
    },
    12 : {
        name : 'Esfand',
        days : 29,
    }
};

/*
* User Selected Date
*/

let selected_year_value = currentJA_Year;
let selected_month_value = currentJA_Month;
let selected_day_value = currentJA_Day;

let Cl_month_value = currentJA_Month;
let Cl_year_value = currentJA_Year;

let formatted_Sl_Date = selected_year_value  + ' / ' + selected_month_value + ' / ' + selected_day_value;
document.querySelector('.date').innerText = formatted_Sl_Date;
/*
* Calendar Month & Year & Days
*/
Cl_year_section.innerText = currentJA_Year;
Cl_month_section.innerText = monthsInfo[currentJA_Month].name;
let monthDaysCount = monthsInfo[Cl_month_value].days;
function addDays(monthDaysCount){
    for (let i = 0; i <monthDaysCount ; i++) {
        let day = document.createElement('div');
        day.classList.add('day');
        day.innerText = i + 1;
        if (day.innerText == selected_day_value && Cl_month_value == selected_month_value && Cl_year_value == selected_year_value ){
            day.classList.add('selected-day');
        }
        day.addEventListener('dblclick',(e) =>{
            removeDays();
            selected_day_value = day.innerText;
            selected_month_value = Cl_month_value
            selected_year_value = Cl_year_value

            formatted_Sl_Date = selected_year_value  + ' / ' + selected_month_value + ' / ' + selected_day_value;
            document.querySelector('.date').innerText = formatted_Sl_Date;
            monthDaysCount = monthsInfo[selected_month_value].days;
            addDays(monthDaysCount);
        })
        Cl_days_section.appendChild(day);
    }
}
function removeDays(){
    // let days = document.querySelectorAll('.day')
    // days.forEach(day =>{
    //     day.remove();
    // })
    Cl_days_section.innerHTML = '';
}
addDays(monthDaysCount);

/*
* Calendar Arrows Events
*/

nArrow.addEventListener('click',nextMonth);
pArrow.addEventListener('click',previousMonth);

function nextMonth(){
    Cl_month_value +=1;
    if (Cl_month_value > 12){
        Cl_year_value += 1;
        Cl_month_value = 1;
    }
    Cl_month_section.textContent = monthsInfo[Cl_month_value].name;
    Cl_year_section.textContent = Cl_year_value
    monthDaysCount = monthsInfo[Cl_month_value].days;
    removeDays();
    addDays(monthDaysCount);
}
function previousMonth(){
    Cl_month_value -=1;
    if (Cl_month_value < 1){
        Cl_year_value -= 1;
        Cl_month_value = 12;
    }
    Cl_month_section.textContent = monthsInfo[Cl_month_value].name;
    Cl_year_section.textContent = Cl_year_value
    monthDaysCount = monthsInfo[Cl_month_value].days;
    removeDays();
    addDays(monthDaysCount);
}

/*
* Calendar Days Event
*/

// Array.from(Cl_days).forEach(day =>{
//     day.addEventListener('dblclick',(e) =>{
//        removeDays();
//        selected_day_value = day.innerText;
//        selected_month_value = Cl_month_value
//        selected_year_value = Cl_year_value
//
//        formatted_Sl_Date = selected_year_value  + ' / ' + selected_month_value + ' / ' + selected_day_value;
//        document.querySelector('.date').innerText = formatted_Sl_Date;
//        monthDaysCount = monthsInfo[selected_month_value].days;
//        addDays(monthDaysCount);
//
//     })
// })

