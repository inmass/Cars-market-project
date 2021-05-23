// image preview
function previewImages() {

    var preview = document.querySelector('#chosen_files');
    preview.innerHTML = "";
 
    if (this.files) {
        [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file) {

        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif|jpg|svg)$/i.test(file.name)) {
            swal({
                title: '',
                text: file.name + " n'est pas une image",
                type: 'error',
            });
        } else {
        
            var reader = new FileReader();
            
            reader.addEventListener("load", function() {
            var image = new Image();
            image.height = 100;
            image.title  = file.name;
            image.style = "margin:2px;margin-top:5px;";
            image.src    = this.result;
            preview.appendChild(image);
            });
            
            reader.readAsDataURL(file);
        }
        
    }

}
  
document.querySelector('#logo_garage').addEventListener("change", previewImages);
  
// image preview

// AJAX request
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const nom = document.getElementById('nom');
const prenom = document.getElementById('prenom');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const password = document.getElementById('password');
const password_confirmation = document.getElementById('password_confirmation');
const nom_garage = document.getElementById('nom_garage');
const fixe = document.getElementById('fixe');
const fax = document.getElementById('fax');
const ville = document.getElementById('ville');
const adresse = document.getElementById('adresse');
const code_postal = document.getElementById('code_postal');
const rc = document.getElementById('rc');
const if_ = document.getElementById('if');
const ice = document.getElementById('ice');
const pack_id = document.getElementById('pack_id');
const pack_end_date = document.getElementById('pack_end_date');

// create event for new car form
document.getElementById('add_garage_form').addEventListener('submit', e=>{
    e.preventDefault(); 

    const fd = new FormData();
    fd.append('nom', nom.value);
    fd.append('prenom', prenom.value);
    fd.append('email', email.value);
    fd.append('phone', phone.value);
    fd.append('password', password.value);
    fd.append('password_confirmation', password_confirmation.value);
    fd.append('nom_garage', nom_garage.value);
    if ($('#logo_garage')[0].files.length != 0 ) {
        fd.append('logo_garage', $('#logo_garage')[0].files[0]);
    }
    fd.append('fixe', fixe.value);
    fd.append('fax', fax.value);
    fd.append('ville', ville.value);
    fd.append('adresse', adresse.value);
    fd.append('code_postal', code_postal.value);
    fd.append('rc', rc.value);
    fd.append('if', if_.value);
    fd.append('ice', ice.value);
    fd.append('pack_id', pack_id.value);
    fd.append('pack_end_date', pack_end_date.value);

    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        data: fd,
        success: function(data){
            $('.errors').empty();
            Object.keys(data).forEach(function(key) {
                if ('success' in data) {
                    $('#profile_edit').modal('hide');
                    $('.errors').empty();
                    swal({
                        title: '',
                        text: data.success,
                        type: 'success',
                    }, function(){ 
                        window.location.replace(redirect_url);
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
// AJAX requests
