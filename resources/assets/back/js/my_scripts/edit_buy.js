//======================  EDIT cOMMODITY =======================
import * as Swal from 'sweetalert2';

$(document).ready(function () {
    $('.edit_buy').click(function () {
        let id = ($(this).parent().attr("id"));
        edit_buy(id);
    })
})

function edit_buy(id) {
    var url = '/mali/edit_buy';
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        data: {_token: CSRF_TOKEN, id: id},
        dataType: 'JSON',
        success: function (result) {
            console.log(result);
            let data = {
                id: result.commodity.id,
                text: result.commodity.title,
            };
            var newOption = new Option(data.text, data.id, false, false);
            $('#commodity_id').empty();
            $('#commodity_id').append(newOption).trigger('change');
            $("input[name='_method']").val("PUT");
            $('input#id').val(result.id);
            $('input#code').val(result.code);
            $('input#count').val(result.count);
            $('input#inventory').val(result.inventory);
            $('input#count').select();
            $('input#unit_price').val(result.unit_price);
            $('input#total_price').val(result.total_price);
            $('input#date').val(result.date);
            $('input#description').val(result.description);
            $('input#unit_sale_price').val(result.unit_sale_price);
            $('input#total_sale_price').val(result.total_sale_price);
            let unit_sale_percent_profit = Math.round(((result.unit_sale_price * 100) / result.unit_price)-100)   ;
            $('input#profit_percent').val(unit_sale_percent_profit + '%');
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






