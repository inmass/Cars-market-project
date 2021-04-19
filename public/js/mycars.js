// // change form data when button clicked
$(".btnModal").click(function () {
    passedID = $(this).data('carid');//get the id of the selected button
    passedUID = $(this).data('caruid');//get the id of the selected button
    post_url = post_url.replace(':id', passedID);
    get_url = get_url.replace(':uid', passedUID);
    $('#statut').val('');
    $('#prix').attr('value', '');


    // sending AJAX GET request
    $.ajax({
        type: 'GET',
        url: get_url,
        success: function(data){
            // price value updating
            $('#prix').attr('value', data.prix)

            // status value updating
            if (data.available == 1 && data.visible == 1) {
                $('#statut').val('en_vente');
            }
            if (data.available == 1 && data.visible == 0) {
                $('#statut').val('en_pause');
            }
            if (data.available == 0) {
                $('#statut').val('vendue');
            } 
        },
        error: function(jqxhr, status, exception){
            console.log('Exception:', exception)
        },
    });
});

// sending post request
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const statut = document.getElementById('statut');
const prix = document.getElementById('prix');
const send_form = document.getElementById('car_edit_form');

send_form.addEventListener('submit', e=>{
    e.preventDefault();

    const fd = new FormData();
    fd.append('statut' , statut.value);
    fd.append('prix', prix.value);

    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: post_url,
        data: fd,
        success: function(data){
            // errors showing
            $('.errors').empty();
            Object.keys(data).forEach(function(key) {
                if ('success' in data) {
                    $('#car_edit').modal('hide');
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
    });
    
});