const newMonth = document.getElementById('cal__month');
const dateDisplay = document.getElementById('cal__date');
const allDates = document.getElementById('cal__days');
const prevBtn = document.getElementById('back__arrow');
const nxtBtn = document.getElementById('next__arrow');
const timeDisplay = document.getElementById('cal__time');

const date = new Date();

// Current Date Display
currentDate = () => {
	const twelveMonths = [
		'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December',
	];

	const sevenDays = [
		'Sunday',
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday',
	];
	const date__weekDay = sevenDays[date.getDay()];
	const date__day = date.getDate();
	const date__year = date.getFullYear();

	newMonth.innerHTML = twelveMonths[date.getMonth()];
	dateDisplay.innerHTML = `${date__weekDay} ${date__day}, ${date__year}`;
};
currentDate();

// Current Time Display
// const showTime = () => {
// 	let time = new Date();
// 	let hour = time.getHours();
// 	let min = time.getMinutes();
// 	let sec = time.getSeconds();
// 	am_pm = 'AM';
// 	if (hour > 12) {
// 		hour -= 12;
// 		am_pm = 'PM';
// 	}
// 	if (hour == 0) {
// 		hr = 12;
// 		am_pm = 'AM';
// 	}
// 	let currentTime = `${hour}:${min} ${am_pm}`;
// 	timeDisplay.innerHTML = currentTime;
// };
// setInterval(showTime(), 1000);

// Generating Dates per Month
const glassCalendar = () => {
	currentDate();

	let days = '';
	let lastDay =
		32 - new Date(date.getFullYear(), date.getMonth(), 32).getDate();
	const emptyDates = date.getDay();

	// For lopp to iterates empty spot where there's no date.
	for (let x = emptyDates; x > 0; x--) {
		days += `<span></span>`;
	}

	// For lopp to iterates through month to generate days & today's date.
	for (let i = 1; i <= lastDay; i++) {
		if (
			i === new Date().getDate() &&
			date.getMonth() === new Date().getMonth()
		) {
			days += `<span class="today">${i}</span>`;
		} else {
			days += `<span>${i}</span>`;
		}

		allDates.innerHTML = days;
	}
};
glassCalendar();

// Added event listener to buttons for
prevBtn.addEventListener('click', () => {
	date.setMonth(date.getMonth() - 1);
	glassCalendar();
});

nxtBtn.addEventListener('click', () => {
	date.setMonth(date.getMonth() + 1);
	glassCalendar();
});
