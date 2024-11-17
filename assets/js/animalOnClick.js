let baseUrl;
if (window.location.hostname === 'localhost') {
    baseUrl = window.location.origin + '/ecf/';
} else {
    baseurl = "https://ecf-arcadia-00d8251bc78c.herokuapp.com/";
}
function displayAnimalInfo(animalId) {
    //Body
    const body = document.getElementById('body')
    //InfosContainer
    const nestedPopup = document.createElement('div');
    $(nestedPopup).attr('id', 'nestedPopup');
    nestedPopup.classList.add('popup');
    //Nested Detail Container
    const nestedDetailsContainer = document.createElement('div');
    nestedDetailsContainer.classList.add('popup-detailContainer');
    //Dom insertion
    nestedPopup.append(nestedDetailsContainer);
    body.appendChild(nestedPopup);

    //AJAX request
    $.get('https://oral-56a335cd47f2.herokuapp.com/animalOnclick/id/' + animalId, function (data) {
        //Dom insertion
        $(nestedDetailsContainer).html(data);
    });
}

