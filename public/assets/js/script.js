function editPatient(elem){
    elem.classList.add('d-none')
    elem.nextElementSibling.classList.remove('d-none')
    inputs = document.getElementsByClassName('pat-int')
    Array.from(inputs).forEach(input => {
        input.removeAttribute('disabled')

    });
}


function editServices(elem){
    console.log(elem.parentElement.previousElementSibling.children[1]);
    elem.nextElementSibling.classList.remove('d-none')
    elem.classList.add('d-none')
    elem.parentElement.previousElementSibling.children[1].classList.remove('d-none')
    elem.parentElement.previousElementSibling.children[0].classList.add('d-none')
    elem.parentElement.previousElementSibling.previousElementSibling.children[1].classList.remove('d-none')
    elem.parentElement.previousElementSibling.previousElementSibling.children[0].classList.add('d-none')
}

function editDrug(elem){
    elem.classList.add('d-none');
    elem.nextElementSibling.classList.remove('d-none');
    elem.parentElement.previousElementSibling.classList.remove('d-none');
    elem.parentElement.parentElement.previousElementSibling.classList.add('d-none');
}

function deleteform(id){
    form = document.getElementById('deleteform');
    form.setAttribute('action','https://projet_fil_rougev2.com/drugs/'+id)
}

function serviceDelete(id){
    form = document.getElementById('deleteform');
    form.setAttribute('action','https://projet_fil_rougev2.com/services/'+id)
}

function switchTab(elem,tab){
Array.from(elem.parentElement.children).forEach(li => {
    li.classList.remove('active')

});
elem.classList.add('active')

 tabs = document.getElementsByClassName('patientTab');
 Array.from(tabs).forEach(tab => {
    tab.classList.add('d-none')

});
document.getElementById(tab).classList.remove('d-none');
}
var globalSelectedPrice;
function selecteService(elem){
    selectedPrice = elem.options[elem.selectedIndex].getAttribute('data-price');
    document.getElementById('selectedPrice').value = selectedPrice;
    document.getElementById('theRest').value = selectedPrice;
    receivedInput = document.getElementById('received');
    receivedInput.removeAttribute('disabled');
    receivedInput.value = 0
    receivedInput.setAttribute('type','number');
    // receivedInput.setAttribute('max',selectedPrice);
    globalSelectedPrice = parseInt(selectedPrice);


}

function receivedChanged(receivedPrice){
    receivedPriceValue = parseInt(receivedPrice.value)
    if(receivedPriceValue > globalSelectedPrice){
        receivedPrice.value = globalSelectedPrice
    }

    document.getElementById('theRest').value = globalSelectedPrice - receivedPrice.value

}
