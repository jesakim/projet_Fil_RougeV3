function editPatient(elem,inp = 'pat-int'){
    elem.classList.add('d-none')
    elem.nextElementSibling.classList.remove('d-none')
    inputs = document.getElementsByClassName(inp)
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

function editDrug(drug){
    console.log(drug);
    form = document.getElementById('editDrugForm');
    baseroute = form.action
    ends = baseroute.slice(-1)
    if(isNaN(ends)){

        form.action = baseroute +'/'+drug.id
    }else{
        form.action = baseroute.slice(0, baseroute.length-2) +'/'+drug.id
    }

    document.getElementById('drugCategory').value = drug.category
    document.getElementById('drugName').value = drug.name


}

function deleteform(id){
    form = document.getElementById('deleteform');
    baseroute = form.action
    form.action = baseroute+'/'+id
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

// var globalSelectedPrice;
function selecteService(elem){
    selectedPrice = elem.options[elem.selectedIndex].getAttribute('data-price');
    document.getElementById('acte-price-inp').value = selectedPrice;


}

function receivedChanged(receivedPrice){
    receivedPriceValue = parseInt(receivedPrice.value)
    if(receivedPriceValue > globalSelectedPrice){
        receivedPrice.value = globalSelectedPrice
    }

    document.getElementById('theRest').value = globalSelectedPrice - receivedPrice.value

}


$(document).ready(function() {
    elem = ['select2-makeReservation','select2-makeOrdonnances','select2-makeInvoice','mselect2-makeOrdonnances']
    elem.forEach(ele => {
        $('.'+ele).select2({
            placeholder: ele.startsWith('m')  ? 'Select drugs' :'Select a patient',
            allowClear : true,
            dropdownParent: $('#'+ele.substr(ele.indexOf('-')+1, ele.length))
        });
    });
    $( ".select2-container" ).addClass( 'w-100 form-control p-1');
});


function pinSidenav(){
    document.querySelector('body').classList.toggle('g-sidenav-pinned')
}


function phoneFormate(inp){
    inp.value = inp.value.split("").map((e,i)=>{
        if(i==4 && e != '-'){
            return '-'+e;
        }
   else if( !isNaN( e ) || (e=='-' && i == 4)){
        return e;
   }else{
    return '';
   }
}).join("");
}


function toggleDrugSelect(btn){
    container = document.getElementById('drug_and_dose_container');
    if(btn == 1){
    clone = container.firstElementChild.cloneNode(true);
    clone.getElementsByClassName('drugindexnumber')[0].textContent = container.children.length+1;
    clone.getElementsByClassName('drugindexnumber')[1].textContent = container.children.length+1;
    container.appendChild(clone)
    }else if(btn == -1 && container.children.length >1){
        container.removeChild(container.lastElementChild);
    }
}

if(document.contains(document.getElementById("ordopersodate_checkbox"))){
document.getElementById("ordopersodate_checkbox").addEventListener("change", function(e) {
if (this.checked) {
    document.getElementById("ordopersodate").classList.remove('d-none');
} else {
    document.getElementById("ordopersodate").classList.add('d-none');
}
});
}

if(document.contains(document.getElementById("notepersodate_checkbox"))){
    document.getElementById("notepersodate_checkbox").addEventListener("change", function(e) {
    if (this.checked) {
        document.getElementById("notepersodate").classList.remove('d-none');
    } else {
        document.getElementById("notepersodate").classList.add('d-none');
    }
    });
}



function drugSearch(inp){
    Array.from(document.getElementsByClassName('drug-card')).forEach(card =>{
        if(!card.getAttribute('data-search-name').toLocaleLowerCase().includes(inp.value.toLocaleLowerCase())){
            card.classList.add('d-none')
        }else{
            card.classList.remove('d-none')
        };
    })
}


function actStandardBtn(elem){
    elem.nextElementSibling.nextElementSibling.classList.remove('text-white');
    elem.classList.add('text-white');
    document.getElementById('actePerso').classList.add('d-none')
    document.getElementById('acteStandard').classList.remove('d-none')
    // document.getElementById('acte-price-inp').value=null
    document.getElementById('service_name').value=null
}

function actPersoBtn(elem){
    elem.previousElementSibling.previousElementSibling.classList.remove('text-white');
    elem.classList.add('text-white')
    document.getElementById('actePerso').classList.remove('d-none')
    document.getElementById('acteStandard').classList.add('d-none')
    document.getElementById('acte-price-inp').value=null
    document.getElementById('service_id').value=null
}


function selectDents(elem,dentNum){
elem.classList.toggle('active');
elem.classList.toggle('text-white');
document.getElementById('btn-check'+dentNum).checked = !document.getElementById('btn-check'+dentNum).checked
}

function addPaymentBtn(id){
    console.log(document.getElementById('act_id').value = id);

}

function deleteActBtn(id){
    console.log(id);
    form = document.getElementById('deleteActform')
    baseroute = form.action
    form.action = baseroute+'/'+id

}


function updateReservation(date,id){
    console.log(id)
    document.getElementById('reservation-date-inp').value=date;
    form = document.getElementById('updateReservationForm')
    baseroute = form.action
    form.action = baseroute+'/'+id
}


// function fillPatientInfo(totalReceived,totalToBePayed){
// console.log(totalReceived);
// }
