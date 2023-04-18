//======================  EDIT cOMMODITY =======================
import * as Swal from 'sweetalert2';

$(document).ready(function () {
    $('.edit_sale').click(function () {
        let id = ($(this).parent().attr("id"));
        edit_sale(id);
    })
})

function edit_sale(id) {
    var url = '/mali/edit_sale';
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        data: {_token: CSRF_TOKEN, id: id},
        dataType: 'JSON',
        success: function (result) {
            // console.log('sale = ',result);
            $("input[name='_method']").val("PUT");
            let data = {
                id: result.commodity.id,
                text: result.commodity.title,
            };
            var newOption = new Option(data.text, data.id, false, false);
            $('#commodity_id').empty();
            $('#commodity_id').append(newOption).trigger('change');
            $('input#id').val(result.id);
            $('input#code').val(result.code);
            $('input#sale_count').val(result.count);
            $('input#sale_count').select();
            $('input#date').val(result.date);
            $('input#discount_price').val(result.discount_price);
            $('#sale_submit_btn').html('<i class="material-icons text-sm">done_all</i> ثبت ویرایش');
            setTimeout(function (){
                $('input#unit_sale_price_in_sale').val(result.unit_price);
                $('input#total_price').val(result.total_price);
            },1000)
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






