var perClassPayment = document.getElementsByClassName("per-class-pay");
console.log(perClassPayment.length);
    var classCount = document.getElementsByClassName("class-count");
console.log("classCount");
    var Totalpay = document.getElementsByClassName("total-pay");

 for(var i = 0; i<classCount.length; i++ ){
    var perClassPaymentInt = parseInt(perClassPayment[i].innerHTML);
    var classCountInt = parseInt(classCount[i].innerHTML);
    Totalpay[i].innerHTML = (perClassPaymentInt * classCountInt).toString();
 }  

