//======================  EDIT cOMMODITY =======================
import * as Swal from'sweetalert2';
$(document).ready(function () {
    $('.edit_cost').click(function () {
        let id = ($(this).parent().attr("id"));
        edit_cost(id);

    })
})

function edit_cost(id) {
    var url = '/mali/edit_cost';
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
            $('input#cost_subject').val(result.subject);
            $('input#cost_amount').val(separate(result.amount));
            $('input#cost_date').val(result.date);
            $('#submit_btn').html('<i class="material-icons text-sm">done_all</i> ثبت ویرایش');
            $(".main-content").animate(
                {scrollTop: "0"}, 1000);
            setTimeout(function (){
                $('input#cost_subject').focus();
                $('input#cost_subject').select();
            },1010)
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

function separate(Number)
{
    Number+= '';
    Number= Number.replace(',', '');
    let x = Number.split('.');
    let y = x[0];
    let z= x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y= y.replace(rgx, '$1' + ',' + '$2');
    return y+ z;
}




