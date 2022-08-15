/*
* Elements
*/

let selectedDate = document.querySelector(".selected-date");
let calendarMonthSection = document.querySelector('.month');
let calendarYearSection = document.querySelector('.year');
let calendarDaysSection = document.querySelector('.days');
let calendarDays = calendarDaysSection.children;
let nextArrow = document.querySelector('.next-month');
let previousArrow = document.querySelector('.previous-month');

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

let currentJalaliDate = gregorian_to_jalali(currentYear,currentMonth +1, currentDay);

let currentJalaliYear = currentJalaliDate[0]
let currentJalaliMonth = currentJalaliDate[1]
let currentJalaliDay = currentJalaliDate[2]
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

function checkKabiseh(year){
    if (year == 1404){
        return true;
    }else if(year == 1403){
        return false
    }else{
        switch (year % 33) {
            case 30:
            case 26:
            case 22:
            case 17:
            case 13:
            case 9:
            case 5:
            case 1:
                return true
                break;
            default:
                return false
        }
    }


}
function monthDaysNum(month,year){
    if (monthsInfo[month].name === 'Esfand' && checkKabiseh(year)){
        monthsInfo[month].days = 30;
        return monthsInfo[month].days;
    }

    return  monthsInfo[month].days;
}


/*
* User Selected Date
*/

let selectedYearValue = currentJalaliYear;
let selectedMonthValue = currentJalaliMonth;
let selectedDayValue = currentJalaliDay;

let calendarMonthValue = currentJalaliMonth;
let calendarYearValue = currentJalaliYear;

let formattedSelectedDate = selectedYearValue  + ' / ' + selectedMonthValue + ' / ' + selectedDayValue;
document.querySelector('.date').innerText = formattedSelectedDate;
/*
* Calendar Month & Year & Days
*/
calendarYearSection.innerText = currentJalaliYear;
calendarMonthSection.innerText = monthsInfo[currentJalaliMonth].name;
let monthDaysCount = monthDaysNum(calendarMonthValue,calendarYearValue);
function addDays(monthDaysCount){
    for (let i = 0; i <monthDaysCount ; i++) {
        let day = document.createElement('div');
        day.classList.add('day');
        day.innerText = i + 1;
        if (day.innerText == selectedDayValue && calendarMonthValue == selectedMonthValue && calendarYearValue == selectedYearValue ){
            day.classList.add('selected-day');
        }
        day.addEventListener('dblclick',(e) =>{
            removeDays();
            selectedDayValue = day.innerText;
            selectedMonthValue = calendarMonthValue
            selectedYearValue = calendarYearValue

            formattedSelectedDate = selectedYearValue  + ' / ' + selectedMonthValue + ' / ' + selectedDayValue;
            document.querySelector('.date').innerText = formattedSelectedDate;
            monthDaysCount = monthsInfo[selectedMonthValue].days;
            addDays(monthDaysCount);
        })
        calendarDaysSection.appendChild(day);
    }
}
function removeDays(){
    calendarDaysSection.innerHTML = '';
}
addDays(monthDaysCount);

/*
* Calendar Arrows Events
*/

nextArrow.addEventListener('click',nextMonth);
previousArrow.addEventListener('click',previousMonth);

function nextMonth(){
    calendarMonthValue +=1;
    if (calendarMonthValue > 12){
        calendarYearValue += 1;
        calendarMonthValue  = 1;
    }
    calendarMonthSection.textContent = monthsInfo[calendarMonthValue].name;
    calendarYearSection.textContent = calendarYearValue
    monthDaysCount = monthDaysNum(calendarMonthValue,calendarYearValue);
    removeDays();
    addDays(monthDaysCount);
}
function previousMonth(){
    calendarMonthValue -=1;
    if (calendarMonthValue  < 1){
        calendarYearValue -= 1;
        calendarMonthValue  = 12;
    }
    calendarMonthSection.textContent = monthsInfo[calendarMonthValue ].name;
    calendarYearSection.textContent = calendarYearValue
    // monthDaysCount = monthsInfo[Cl_month_value].days;
    monthDaysCount = monthDaysNum(calendarMonthValue ,calendarYearValue);
    removeDays();
    addDays(monthDaysCount);
}


