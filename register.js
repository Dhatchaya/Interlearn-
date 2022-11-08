const e = document.getElementById('class');

const AL = document.getElementById('AL');
const secondary = document.getElementById('grade');

e.addEventListener('change', function handleChange(event){
    if(event.target.value === 'secondary'){

        secondary.style.display = 'block';
        AL.style.display='none';

    }
    else{
        AL.style.display='block';
        secondary.style.display = 'none';
    }
});
