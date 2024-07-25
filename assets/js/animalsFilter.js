
function animalsFilter() {
    //Init
    const searchField = document.getElementById("search-field");
    let query = searchField.value.toLowerCase();

    const animalElements = document.getElementsByClassName('animal');

    for (let i = 0; i < animalElements.length; i++) {
        let animalNameElement = animalElements[i].getElementsByClassName('animal-name');
        let animalName = (animalNameElement[0].innerText).toLowerCase();
        let animalLivingElement = animalElements[i].getElementsByClassName('animal-living');
        let animalLiving = (animalLivingElement[0].innerText).toLowerCase();
        let animalSpecieElement = animalElements[i].getElementsByClassName('animal-specie');
        let animalSpecie = (animalSpecieElement[0].innerText).toLowerCase();

        if (!animalName.includes(query)) {
            animalElements[i].style.display = 'none';
        }
        else {
            animalElements[i].style.display = 'flex';
        }
        if (animalLiving.includes(query)) {
            animalElements[i].style.display = 'flex';
        }
        if (animalSpecie.includes(query)) {
            animalElements[i].style.display = 'flex';
        }
    }
}