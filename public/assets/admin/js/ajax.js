$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(() => {

    //EDIT CATEGORY
    $('.edit').click(function() {
        let id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "admin/category/" + id + "/edit",
            dataType: "json",
            success: function (res) {
                $('.name').val(res.name);
                if(res.status == 1) {
                    $('.show').attr('selected','selected');
                }else {
                    $('.dont-show').attr('selected','selected');
                }
            }
        });
        setTimeout(() => {
            $('#edit').modal();
        }, 500);

        $('.update').click(function () { 
            let name = $('.name').val();
            let status = $('.status').val();
            
            $.ajax({
                type: "put",
                url: "admin/category/" + id,
                data: {
                    name,
                    status
                },
                dataType: "json",
                success: function (res) {
                    if (res.error) {
                        $('.error').show();
                        $('.error').html(res.error.name[0]);
                        
                    }else {
                        toastr.success(res.success ,{timeOut:5000} );
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            });
        });
    });

    //DELETE CATEGORY
    $('.delete').click(function () {
        let id = $(this).data('id');
        $('.del').click(function() {
            $.ajax({
                type: "delete",
                url: "admin/category/" + id,
                dataType: "json",
                success: function (res) {
                    toastr.success(res.success ,{timeOut:5000} );
                    $('.del').modal('hide');
                    location.reload();
                }
            });
        })
        
    });

    //EDIT PRODUCT TYPE
    $('.editProductType').click(function() {
        let id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "admin/product-type/" + id + "/edit",
            dataType: "json",
            success: function (res) {
                $('.name').val(res.name);

                let cate = document.querySelector('.category').options;
                for (let i = 0; i < cate.length; i++) {
                    if(cate[i].value == res.idCategory) {
                        cate[i].setAttribute('selected','selected');
                    }
                }

                if(res.status == 1) {
                    $('.show').attr('selected','selected');
                }else {
                    $('.dont-show').attr('selected','selected');
                }
            }
        });
        setTimeout(() => {
            $('#editProductType').modal();
        }, 500);

        $('.updateProductType').click(function () { 
            let name = $('.name').val();
            let category = $('.category').val();
            let status = $('.status').val();
            
            $.ajax({
                type: "put",
                url: "admin/product-type/" + id,
                data: {
                    name,
                    category,
                    status
                },
                dataType: "json",
                success: function (res) {
                    if (res.error) {
                        $('.error').show();
                        $('.error').html(res.error.name[0]);
                        
                    }else {
                        toastr.success(res.success ,{timeOut:5000} );
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            });
        });
    });


    //DELETE PRODUCT TYPE
    $('.deleteProductType').click(function () {
        let id = $(this).data('id');
        $('.del').click(function() {
            $.ajax({
                type: "delete",
                url: "admin/product-type/" + id,
                dataType: "json",
                success: function (res) {
                    toastr.success(res.success ,{timeOut:5000} );
                    $('.del').modal('hide');
                    location.reload();
                }
            });
        })
        
    });
})