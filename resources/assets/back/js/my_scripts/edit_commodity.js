//======================  EDIT cOMMODITY =======================
import * as Swal from'sweetalert2';
$(document).ready(function () {
    $('.edit_commodity').click(function () {
        let id = ($(this).parent().attr("id"));
        edit_commodity(id);

    })
})

function edit_commodity(id) {
    var url = '/mali/edit_commodity';
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        data: {_token: CSRF_TOKEN, id: id},
        dataType: 'JSON',
        success: function (result) {
            console.log(result);
            $("input[name='_method']").val("PUT");
            $('input#id').val(result.id);
            $('input#code').val(result.code);
            $('input#title').val(result.title);
            $('input#title').select();
            $('#submit_btn').html('<i class="material-icons text-sm">done_all</i> ثبت ویرایش');
            $(".main-content").animate(
                {scrollTop: "0"}, 1000);
        },
        error: function (error) {
            Swal.fire({
                icon: 'error',
                title: 'خطا!',
                text: 'در اجرای عملیات درخواستی خطایی رخ داده است،لطفا با پشتیبانی تماس بگیرید',
                footer: '<a href="tel:+989156012679">تماس با پشتیبانی</a>'
            })

        }
    });
}






