$('#formTwit').on('submit', function(e) {
    e.preventDefault();
    //alert('test');

    let form = $('#formTwit');
    let data = form.serialize();

    // console.dir(data);
    $.ajax({
        type: "POST",
        url: "/modules/add-twit.php",
        data: data,
        success: function(data){
            let ajaxStatus = $('#ajaxStatus').html(data)
        }
      });


});