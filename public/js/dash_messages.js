// // change form data when button clicked
$(".btnModal").click(function () {
    passedID = $(this).data('messageid');//get the id of the selected button
    $('#message_owner').text('');
    $('#message_body').text('');
    $('#message_phone').text('');
    $('#message_phone').attr('href','');
    $('#message_email').text('');
    $('#message_email').attr('href','');


    // sending AJAX GET request
    $.ajax({
        type: 'GET',
        url: window.location.href+'/'+passedID,
        success: function(data){
            // price value updating
            $('#message_owner').text(data.full_name);
            $('#message_body').text(data.text);
            $('#message_phone').text(data.phone);
            $('#message_phone').attr('href','tel:'+data.phone);
            $('#message_email').text(data.email);
            $('#message_email').attr('href','mailto:'+data.email);
            $("[data-rowindex="+passedID+"]").attr('class', ''); //clearing class name to remove bold style
        },
    });
});