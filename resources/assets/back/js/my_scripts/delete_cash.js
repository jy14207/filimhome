//======================  CHANGE USER STATUS
// const Swal = require('sweetalert2');
import * as Swal from'sweetalert2';
$(document).ready(function () {
    $('.delete_cash').click(function () {
        let id = ($(this).parent().attr("id"));
        Swal.fire({
            title: "حذف رکورد",
            text: 'آیا مطمین هستید؟.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'بله مطمئنم',
            cancelButtonText: 'لفو عملیات '
        }).then(function (result) {
            if (result.isConfirmed) {
                delete_cash(id);
            }
        });
    })
})

function delete_cash(id) {
    var url = '/mali/delete_cash';
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        data: {_token: CSRF_TOKEN, id: id},
        dataType: 'JSON',
        success: function (result) {
            $('tr#' + result).hide('slow', function () {
                $('tr#' + result).remove();
            });
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






