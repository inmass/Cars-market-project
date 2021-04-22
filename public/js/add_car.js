// form wizard
$('#form_wizard').bootstrapWizard({
    'tabClass': 'nav nav-tabs navtab-wizard nav-justified bg-muted',
    onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;

        var wizard = navigation.closest('#form_wizard');
        console.log($current);

        // If it's the last tab then hide the last button and show the finish instead
        if($current == 1) {
            $(wizard).find('.previous').hide();
            $(wizard).find('.submit').hide();
        } else if ($current >= $total) {
            $(wizard).find('.next').hide();
            $(wizard).find('.submit').show();
        } else {
            $(wizard).find('.previous').show();
            $(wizard).find('.next').show();
            $(wizard).find('.submit').hide();
        }
    }
});

document.getElementById('tab1').addEventListener('submit',function(){
    if (this.classList.contains('active')) {
        $('#previous').hide();
    } else {
        $('#previous').show()
    }
});
// form wizard

// marque and models "other" inputs handling
var initialText = $('.editable').val();
$('.editOption').val(initialText);

$(function(){
    var conditionalSelect = $("#select_modele"),
        // Save possible options
        options = conditionalSelect.children(".conditional").clone();
        empty = "<option disabled selected></option>"
    
    $("#marque").change(function(){

        var selected = $('option:selected', this).attr('class');
        var optionText = $('.editable').text();
        
        // when select other show input
        if(selected == "editable"){
            $('.editOption').show();
            $('#select_modele').val('');
            $('#select_modele').hide().prop('disabled',true);
            $('#input_modele').show().prop('disabled',false);

            $('.editOption').keyup(function(){
                var editText = $('.editOption').val();
                $('.editable').val(editText);
                $('.editable').html(editText);
            });

        }else{

            $('.editOption').hide();
            $('#input_modele').val('');
            $('#input_modele').hide().prop('disabled',true);
            $('#select_modele').show().prop('disabled',false);

            var value = $(this).val();                
            conditionalSelect.children().remove();
            conditionalSelect.append(empty)
            options.clone().filter("."+value).appendTo(conditionalSelect);

        }
    }).trigger("change");
});
// marque and models "other" inputs handling
// AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// token form
const token_form = document.getElementById('token_form');
const car_token = document.getElementById('car_token');

// create event for token form
token_form.addEventListener('submit', e=>{
    e.preventDefault();

    const fd = new FormData();
    fd.append('car_token' , car_token.value);
    fd.append('token_form', '');

    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        data: fd,
        success: function(data){
            $('.errors').empty();
            Object.keys(data).forEach(function(key) {
                if ('success' in data) {
                    $('.errors').empty();
                    swal({
                        title: '',
                        text: data.success,
                        type: 'success',
                    }, function(){ 
                        window.location.replace(redirect_url);
                    });
                    $('#token_form').trigger("reset");
                } else if ('car_token' in data) {
                    $('#car_token_errors').html(data[key]);
                } else if ('limit' in data) {
                    swal({
                        title: '',
                        text: data.limit,
                        type: 'info',
                    }, function(){ 
                        window.location.replace(redirect_url);
                    });
                } else {
                    swal({
                        title: '',
                        text: data[key],
                        type: 'error',
                    });
                }
            })
        },
        error: function(jqxhr, status, exception){
            console.log('Exception:', exception)
        },
        cache: false,
        contentType: false,
        processData: false,
    });
    
});

// new car form
const new_car_form = document.getElementById('new_car_form');
const marque = document.getElementById('marque');
const input_modele = document.getElementById('input_modele');
const select_modele = document.getElementById('select_modele');
const version = document.getElementById('version');
const prix = document.getElementById('prix');
const carburant = document.getElementById('carburant');
const boite_de_vitesse = document.getElementById('boite_de_vitesse');
const annee_mise_en_circulation = document.getElementById('annee_mise_en_circulation');
const dedouane = document.getElementById('dedouane');
const kilometrage = document.getElementById('kilometrage');
const couleur = document.getElementById('couleur');
const carrosserie = document.getElementById('carrosserie');
const portes = document.getElementById('portes');
const puissance_fiscale = document.getElementById('puissance_fiscale');
const premiere_main = document.getElementById('premiere_main');
const garantie = document.getElementById('garantie');
// const options = document.getElementsByName('options[]');

var number_of_selected = 0;
// create event for new car form
new_car_form.addEventListener('submit', e=>{
    e.preventDefault();

    var options_array = [];

    $('input[name="options[]"]:checked').each (function (index, element) {
        options_array.push( $(element).val());
    });   
    
    const fd = new FormData();
    fd.append('marque', marque.value);
    if (input_modele.value) {
        fd.append('input_modele', input_modele.value);
    } else {
        fd.append('select_modele', select_modele.value);
    }
    fd.append('version', version.value);
    fd.append('prix', prix.value);
    fd.append('carburant', carburant.value);
    fd.append('boite_de_vitesse', boite_de_vitesse.value);
    fd.append('annee_mise_en_circulation', annee_mise_en_circulation.value);
    fd.append('dedouane', dedouane.value);
    fd.append('kilometrage', kilometrage.value);
    fd.append('couleur', couleur.value);
    fd.append('carrosserie', carrosserie.value);
    fd.append('portes', portes.value);
    fd.append('puissance_fiscale', puissance_fiscale.value);
    fd.append('premiere_main', premiere_main.value);
    fd.append('garantie', garantie.value);
    fd.append('options', options_array);
    fd.append('new_car_form', '');

    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        data: fd,
        success: function(data){
            Object.keys(data).forEach(function(key) {
                if ('success' in data) {
                    swal({
                        title: '',
                        text: data.success,
                        type: 'success',
                    }, function(){ 
                        window.location.replace(redirect_url);
                    });
                } else if ('limit' in data) {
                    swal({
                        title: '',
                        text: data.limit,
                        type: 'info',
                    }, function(){ 
                        window.location.replace(redirect_url);
                    });
                } else {
                    swal({
                        title: '',
                        text: data[key],
                        type: 'error',
                    });
                }
            })
        },
        error: function(jqxhr, status, exception){
            console.log('Exception:', exception)
        },
        cache: false,
        contentType: false,
        processData: false,
    });
    
});
// AJAX requests