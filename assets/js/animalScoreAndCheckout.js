
function hideOrShow(animalId){
    let id = 'animal'+ animalId;
    let container = document.getElementById(id);
    if (container.style.display === 'none') {
        container.style.display = 'flex';
    }
    else {
        container.style.display = 'none';
    }


}
