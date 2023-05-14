function editQuestion(marks) {
    const modal = document.getElementById('modal');
    modal.style.display = 'block';

    input_marks = document.getElementById('input_marks').value = marks;
    // input_question = document.getElementById('input_question').value = question;
    // input_time = document.getElementById('format_time1').value = time;

    window.onclick = function() {
        if(event.target == modal) {
            modal.style.display = 'none';
        }
    }
}