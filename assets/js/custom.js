$(document).on('submit', 'cart', function(ev) {
    ev.preventDefault();
    let mee = $(this);
    let mee_form = $(this).serialize();
    $('.default-load').attr('hidden', true);
    $('.let-load').removeAttr('hidden');
    $('input').attr('readonly', true);
    $('#student_new').find('button').attr('disabled', true);

    $.ajax({
        url: 'core/data?action=new_student',
        type: 'POST',
        // dataType: 'json',
        data: mee_form,
        success: function(res) {
            if (res=='success') {

                Swal.fire({
                    type: 'success',
                    title: 'Registration Completed',
                    text: "To activate your account, kindly click on the button to make payment",
                    // footer: "You will receive an email once your acccount is approved",
                    // allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#d33',
                    allowOutsideClick: false,
                    confirmButtonText: 'Activate Now'
                }).then((result) => {

                    if (result.value) {
                Swal.fire({
                            title: 'Please Wait!',
                            text: 'Processing...',
                            timer: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    window.location = 'payment';
                    }
                })
                ;
            }
        },
        error: function(error_msg) {
            console.log(error_msg);
        }

    })

})
