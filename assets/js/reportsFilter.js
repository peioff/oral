/**
 * This function is used to hide or show the DOM elements that contains query
 */
function reportFilter(){

    //Init
    const searchField = document.getElementById("search-field");
    let query = searchField.value.toLowerCase();

    let reportsElement = document.getElementsByClassName("report");

    for(let i = 0; i < reportsElement.length; i++){
        let dateElement = reportsElement[i].getElementsByClassName('report-date');
        let date = dateElement[0].innerText.toLowerCase();
        let animalElement = reportsElement[i].getElementsByClassName('report-animal');
        let animalName = animalElement[0].innerText.toLowerCase();

        if(!date.includes(query)){
            reportsElement[i].style.display = 'none';
        }
        else {
            reportsElement[i].style.display = 'flex';
        }
        if(animalName.includes(query)){
            reportsElement[i].style.display = 'flex';
        }
    }
}