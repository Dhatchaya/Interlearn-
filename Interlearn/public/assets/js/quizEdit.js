function toModal(duration, total, description, iname, enable_time, disable_time) {
    const modal = document.getElementById('modal');
    modal.style.display = 'block';
    console.log(document.getElementById('input_name'));
    input_marks = document.getElementById('input_description').value = description;

    input_name = document.getElementById('input_name').value = iname;
    input_total = document.getElementById('input_total').value = total;
    enable_time = document.getElementById('enable_time').value = enable_time;
    disable_time = document.getElementById('disable_time').value = disable_time;
    input_duration = document.getElementById('input_duration').value = duration;
    // format_time = document.getElementById('format_time').value = iformat;

    window.onclick = function() {
        if(event.target == modal) {
            modal.style.display = 'none';
        }
    }
}