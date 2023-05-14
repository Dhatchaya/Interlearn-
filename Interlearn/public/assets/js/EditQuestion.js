function editQuestion(question, marks, choice1, choice2, choice3, choice4, time1, time2, time3, time4) {
    const modal = document.getElementById('modal');
    modal.style.display = 'block';

    input_marks = document.getElementById('input_marks').value = marks;
    input_question = document.getElementById('input_question').value = question;
    input_choice1 = document.getElementById('input_choice1').value = choice1;
    input_choice1 = document.getElementById('input_choice2').value = choice2;
    input_choice1 = document.getElementById('input_choice3').value = choice3;
    input_choice1 = document.getElementById('input_choice4').value = choice4;
    format_time1 = document.getElementById('format_time1').value = time1;
    input_time2 = document.getElementById('format_time2').value = time2;
    input_time3 = document.getElementById('format_time3').value = time3;
    input_time4 = document.getElementById('format_time4').value = time4;

    window.onclick = function() {
        if(event.target == modal) {
            modal.style.display = 'none';
        }
    }
}