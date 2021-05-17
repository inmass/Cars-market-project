const garage_form = document.getElementById('garage_form');
const nom_garage = document.getElementById('nom_garage');
const adresse = document.getElementById('adresse');
const phone = document.getElementById('phone');
const fixe = document.getElementById('fixe');
const fax = document.getElementById('fax');
const code_postal = document.getElementById('code_postal');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// create event for garage_form
garage_form.addEventListener('submit', e=>{
    e.preventDefault();

    const fd = new FormData();
    fd.append('nom_garage', nom_garage.value);
    fd.append('adresse', adresse.value);
    fd.append('phone', phone.value);
    fd.append('fixe', fixe.value);
    fd.append('fax', fax.value);
    fd.append('code_postal', code_postal.value);

    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        data: fd,
        success: function(data){
            $('.errors').empty();
            Object.keys(data).forEach(function(key) {
                if ('success' in data) {
                    $('#garage_edit').modal('hide');
                    $('.errors').empty();
                    swal({
                        title: '',
                        text: data.success,
                        type: 'success',
                    }, function(){ 
                        location.reload();
                    });
                } else {
                    $('#'+key+'_errors').html(data[key]);
                }
            })
        },
        error: function(jqxhr, status, exception){
            console.log('Exception:', exception)
        },
        cache: false,
        contentType: false,
        processData: false,
    })
    
})