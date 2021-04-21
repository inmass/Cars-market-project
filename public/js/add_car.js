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
            $('#select_modele').hide().prop('required',false);
            $('#input_modele').show().prop('required',true);

            $('.editOption').keyup(function(){
                var editText = $('.editOption').val();
                $('.editable').val(editText);
                $('.editable').html(editText);
            });

        }else{

            $('.editOption').hide();
            $('#input_modele').val('');
            $('#input_modele').hide().prop('required',false);
            $('#select_modele').show().prop('required',true);

            var value = $(this).val();                
            conditionalSelect.children().remove();
            conditionalSelect.append(empty)
            options.clone().filter("."+value).appendTo(conditionalSelect);

        }
    }).trigger("change");
});