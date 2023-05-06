function toModal(marks) {
    const modal = document.getElementById('modal');
    modal.style.display = 'block';

    input_marks = document.getElementById('input_marks').value = marks;


    window.onclick = function() {
        if(event.target == modal) {
            modal.style.display = 'none';
        }
    }
}