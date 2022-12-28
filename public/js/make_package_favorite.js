$(document).ready(function() {
    var TTHIS;
    var isNotCustomerLogged = true;
    $(document).on('click', '.home-update-favorite', function() {
        // $(this).addClass('item-card2-icons-r');
        TTHIS = $(this);
        var agree = Swal.fire({
            title: 'Add to wishlist?',
            text: "",
            icon: '',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            // cancelButtonText: 'No',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(TTHIS);
                const package_id = TTHIS.data('package_id');
                $('#package_id').val(package_id);
                const customer_login_status = TTHIS.data('customer_login_status');
                //If Customer is not Logined Then Login with also add the favuoirte.
                if (customer_login_status == 0 && isNotCustomerLogged) {
                    $('#enquiryModal').modal('show');
                    return false;
                }

                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        package_id: package_id,
                        _token: _token
                    },
                    success: function(response) {
                        if (response.status == true) {
                            // console.log(TTHIS);
                            TTHIS.addClass('item-card2-icons-r');
                            TTHIS.removeClass('home-update-favorite');

                        }
                    },
                    error: function(request, status, error) {
                        let json = jQuery.parseJSON(request.responseText);
                        Lobibox.notify('error', {
                            size: 'mini',
                            soundPath: "{{ asset('') }}vendor/lobibox/sounds/",
                            sound: 'sound3',
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            width: 400,
                            rounded: true,
                            msg: json.message,
                            delay: 3000,
                            delayIndicator: false,
                        });
                    }
                });
                // }

            } else {
                false;
            }
        })

    }); //End of Function

    $(document).on('click', '#customer_login', function(e) {
        e.preventDefault();
        // console.log($('#Login').serialize());
        // alert('Clicked');
        let data = $('#Login').serialize();
        console.log(data);
        $.ajax({
            url: customerLogin,
            type: 'post',
            dataType: 'json',
            data: data,
            success: function(response) {
                if (response.status) {
                    $('#enquiryModal').modal('hide');
                    isNotCustomerLogged = false;
                    TTHIS.addClass('item-card2-icons-r');
                    TTHIS.removeClass('home-update-favorite');
                    window.location.reload();
                } else {
                    conslole.log(response.message);
                }
            }
        })

    })
});