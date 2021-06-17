
$("#category").select2();
$("#sub_category").select2();
$("#brands").select2();

$('#category').on('change', function (e){
    var category_id = $(this).val();
    if (category_id){
        $.ajax({
            url: '/category/id/'+category_id,
            method: 'GET',
            dataType: 'JSON',
            success:function (data) {
                if (data.length == 0){
                    $('#subCategory-card').hide('slow');
                    $('#brand-card').hide('slow');
                    swal({
                        position: 'top-end',
                        type: 'error',
                        title: 'error',
                        text:'no have any Sub Category for this Category',
                        showConfirmButton: true,
                    });
                }
                else{
                    $('#subCategory-card').show('slow');
                    $('#sub_category').append('<option>Processing.....</option>');
                    $('#sub_category').empty();

                    $.each(data, function (key, value) {
                        $('#sub_category').append('<option selected>'+'~~Select Your Sub Category~~'+'</option>');
                        $('#sub_category').append('<option value="'+value.id+'" >'+value.name+'</option>');
                    })
                }
            }
        })
    } else{
        $('#sub_category').empty();
    }
})


$('#sub_category').on('click', function (e){
    var subCategoryId = $(this).val();
    if (subCategoryId){
        $.ajax({
            url: '/sub-category/id/'+subCategoryId,
            method: 'GET',
            dataType: 'JSON',
            success:function (data){
                if (data.length == 0){
                    $('#brand-card').hide('slow');
                    swal({
                        position: 'top-end',
                        type: 'error',
                        title: 'error',
                        text:'no have any brands for this sub category',
                        showConfirmButton: true,
                    });
                }else{
                    $('#brand-card').show('slow');
                    $('#brands').append('<option selected>Processing.....</option>');
                    $('#brands').empty();
                    $.each(data, function (key, value) {
                        var id = key+1;
                        $('#brands').append('<option value="'+id+'" >'+value.name+'</option>');
                    })
                }
            }
        })
    }else{
        $('#brands').empty();
    }



})
