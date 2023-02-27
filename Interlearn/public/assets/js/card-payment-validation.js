

const form = document.querySelector('form');
const errorSpace1 = document.querySelector('.errorSpace1');
const errorSpace2 = document.querySelector('.errorSpace2');
const errorSpace3 = document.querySelector('.errorSpace3');
const errorSpace4 = document.querySelector('.errorSpace4');

form.addEventListener('submit', (event) => {
  event.preventDefault();
  errorSpace1.innerHTML = ""; // clear any previous error messages
  errorSpace2.innerHTML = "";
  errorSpace3.innerHTML = "";
  errorSpace4.innerHTML = "";

  const cardNumber = document.querySelector('#card-number');
  const nameOnCard = document.querySelector('#card-holder-name');
  const expiryMonth = document.querySelector('#expiry-month');
  const expiryYear = document.querySelector('#expiry-year');
  const cvv = document.querySelector('#cvv');

  let error = false;

  // if (!cardNumber.value) {
  //   errorSpace1.innerHTML += "*Card number is required<br>";
  //   error = true;
  // } else {
  //   let cardNumberStr = cardNumber.value.toString();
  //   let cardNumberRegex = /^[0-9]{16}$/;
  //   if (!cardNumberRegex.test(cardNumberStr)) {
  //     errorSpace1.innerHTML += "*Card number is invalid<br>";
  //     error = true;
  //   }
  // }

  // if (!nameOnCard.value) {
  //   errorSpace2.innerHTML += "*Name on card is required<br>";
  //   error = true;
  // }

  // if (!expiryMonth.value) {
  //   errorSpace3.innerHTML += "*Expiry Month is required..  ";
  //   error = true;
  // } else {
  //   let expiryMonthStr = expiryMonth.value.toString();
  //   if (!(expiryMonthStr >= 1 && expiryMonthStr <= 12)) {
  //     errorSpace3.innerHTML += "*Expiry month is invalid..  ";
  //     error = true;
  //   }
  // }

  // if (!expiryYear.value) {
  //   errorSpace3.innerHTML += "*Expiry year is required ";
  //   error = true;
  // } else {
  //   let expiryYearStr = expiryYear.value.toString();
  //   if (!(expiryYearStr >= 0 && expiryYearStr <= 99)) {
  //     errorSpace3.innerHTML += "*Expiry year is invalid ";
  //     error = true;
  //   }
  // }

  // if (!cvv.value) {
  //   errorSpace4.innerHTML += "*CVV is required<br>";
  //   error = true;
  // } else {
  //   let cvvStr = cvv.value.toString();
  //   if (!(cvvStr >= 100 && cvvStr <= 999)) {
  //     errorSpace4.innerHTML += "*CVV is invalid<br>";
  //     error = true;
  //   }
  // }

  if (!error) {
    form.submit();
  }
});