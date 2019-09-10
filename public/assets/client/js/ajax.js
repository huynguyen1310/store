$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('.items-count').click(function() {
        let rowId = $(this).data('id');
        let qtyElement = '#sst-' + rowId;
        let qty = $(qtyElement).val();
        $.ajax({
            type: "put",
            url: "cart/" + rowId,
            data: {
                qty
            },
            dataType: "json",
            success: function (res) {
                toastr.success(res.success ,{timeOut:5000} );
                location.reload();
            }
        });
    })

    $('.delete-cart').click(function() {
        let rowId = $(this).data('id');
        $.ajax({
            type: "delete",
            url: "cart/" + rowId,
            dataType: "json",
            success: function (res) {
                // toastr.success(res.success ,{timeOut:5000} );
                location.reload();
            }
        });
    })

    $('.checkout').click(function () {
        let total = $('.total').text().replace('$','').replace(',','');
        let name = $('.name').val();
        let phone = $('.phone').val();
        let email = $('.email').val();
        let address = $('.address').val();

        $.ajax({
            type: "post",
            url: "cart",
            data: {
                total,
                name,
                phone,
                email,
                address
            },
            dataType: "json",
            success: function (res) {
                toastr.success(res.success ,{timeOut:5000} );
                location.href = '/';
            }
        });
    });

})
