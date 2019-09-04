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

    $('.addProductCategory').change(function() {
        let idCate = $(this).val();
        $(".addProductType").empty();
        
        if($(this).children("option:selected").val() == 0)
        {
            $(".addProductType").attr('disabled',true);
        }else {
            $.ajax({
                type: "get",
                url: "getproducttype/" + idCate,
                dataType: "json",
                success: function (res) {
                    for (let i = 0; i < res.length; i++) {                 
                        let opt = document.createElement('option');
                        // create text node to add to option element (opt)
                        opt.appendChild( document.createTextNode(res[i].name) );
                        // set value property of opt
                        opt.value = res[i].id;
                        $(".addProductType").append(opt);
                    }
                    $(".addProductType").removeAttr('disabled');
                }
            });
        }
    })

    //EDIT PRODUCT
    $('.editProduct').click(function() {
        let id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "admin/product/" + id + "/edit",
            dataType: "json",
            success: function (res) {
                $('.name').val(res.name);
                $('.qty').val(res.qty);
                $('.price').val(res.price);
                $('.promo').val(res.promo);
                editor.setData(res.description);
                $('.status').val(res.status);
            }
        });
        setTimeout(() => {
            $('#editProduct').modal();
        }, 500);

        $('.updateProduct').click(function () { 
            let name = $('.name').val();
            let category = $('.addProductType').children("option:selected").val();
            let status = $('.status').val();
            let qty = $('.qty').val();
            let price = $('.price').val();
            let promo = $('.promo').val();
            let desc = editor.getData();
            console.log('click');
            
            $.ajax({
                type: "put",
                url: "admin/product/" + id,
                data: {
                    name,
                    category,
                    status,
                    qty,
                    price,
                    promo,
                    desc
                },
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    
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

    
    //DELETE PRODUCT
    $('.deleteProduct').click(function () {
        let id = $(this).data('id');
        $('.del').click(function() {
            $.ajax({
                type: "delete",
                url: "admin/product/" + id,
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