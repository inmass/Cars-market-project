// ajax
// profile
const profile_form = document.getElementById('profile_form');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
// password
const password_form = document.getElementById('password_form');
const old_password = document.getElementById('old_password');
const new_password = document.getElementById('new_password');
const new_password_confirmation = document.getElementById('new_password_confirmation');
// garage
const garage_form = document.getElementById('garage_form');
const nom_garage = document.getElementById('nom_garage');
const adresse = document.getElementById('adresse');
const fixe = document.getElementById('fixe');
const fax = document.getElementById('fax');
const code_postal = document.getElementById('code_postal');

const csrf = document.getElementsByName('_token')[0].value;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

profile_form.addEventListener('submit', e=>{
    e.preventDefault();

    const fd = new FormData();
    fd.append('email' , email.value);
    fd.append('phone', phone.value);

    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        data: fd,
        success: function(data){
            console.log(data);
        },
        error: function(){
            console.log('There was an error');
        },
        cache: false,
        contentType: false,
        processData: false,
    });
    
});

// create event for password_form
password_form.addEventListener('submit', e=>{
    e.preventDefault();

    const fd = new FormData();
    fd.append('_token', csrf);
    fd.append('old_password', old_password.value);
    fd.append('new_password', new_password.value);
    fd.append('new_password_confirmation', new_password_confirmation.value);

    $.ajax({
        type: 'POST',
        url: url,
        Accept: 'application/json',
        enctype: 'multipart/form-data',
        data: fd,
        success: function(data){
            console.log(data.message);
        },
        error: function(data){
            console.log(data.message);
        },
        cache: false,
        contentType: false,
        processData: false,
    })
    
})

// create event for garage_form
garage_form.addEventListener('submit', e=>{
    e.preventDefault();

    const fd = new FormData();
    fd.append('_token', csrf);
    fd.append('nom_garage', nom_garage.value);
    fd.append('adresse', adresse.value);
    fd.append('fixe', fixe.value);
    fd.append('fax', fax.value);
    fd.append('code_postal', code_postal.value);

    $.ajax({
        type: 'POST',
        url: url,
        enctype: 'multipart/form-data',
        data: fd,

        success: function(data){
            console.log(data.message);
        },
        error: function(data){
            console.log(data.message);
        },
        cache: false,
        contentType: false,
        processData: false,
    })
    
})