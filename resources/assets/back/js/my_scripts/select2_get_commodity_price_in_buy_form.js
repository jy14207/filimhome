import Swal from "sweetalert2";

$(document).ready(function () {
    $('.sale-commodity-select2').on('change', function() {
        let commodity_id =  this.value;
        var url = '/mali/get_available_factors';
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: url,
            type: 'POST',
            data: {_token: CSRF_TOKEN, id: commodity_id},
            dataType: 'JSON',
            success: function (result) {
                $("#invoices_with_inventory").empty();
                if (result.length == 0){
                    $("#invoices_with_inventory").addClass('text-danger')
                    $("#sale_submit_btn").hide();
                    $('#sale_submit_btn_hidden').get(0).type = 'text';
                    $("#invoices_with_inventory").append('<option>این کالا فاقد موجودی انبار می باشد، نمیتوانید فروشی برای آن ثبت کنید</option>');
                    $('#unit_sale_price_in_sale').val(0);
                    $('#total_price').val(0);
                }
                else {
                    result.map((item)=>{
                        $("#invoices_with_inventory").append(`<option id="${separate(item.unit_sale_price)}" value=${item.id}>قیمت فروش : ${separate(item.unit_sale_price)} - موجودی انبار : ${item.inventory} عدد - تاریخ خرید : ${item.date}</option>`);
                    });
                    $('#unit_sale_price_in_sale').val($('#invoices_with_inventory').find("option:first").attr("id"));
                    $("#sale_submit_btn").show()
                    $('#sale_submit_btn_hidden').get(0).type = 'submit';
                    $("#invoices_with_inventory").removeClass('text-danger');
                    let sale_count = $("#sale_count").val().replace(/,/g, "");
                    let unit_sale_price_in_sale = $("#unit_sale_price_in_sale").val().replace(/,/g, "");
                    let total_price = separate(sale_count * unit_sale_price_in_sale);
                    $("#total_price").val(total_price);
                }
                $('#sale_count').focus();
            },
        });
    });

    $('#invoices_with_inventory').on('change',function (){
        $('#unit_sale_price_in_sale').val(separate($(this).children(":selected").attr("id")));
        let sale_count = $("#sale_count").val().replace(/,/g, "");
        let unit_sale_price_in_sale = $("#unit_sale_price_in_sale").val().replace(/,/g, "");
        let total_price = separate(sale_count * unit_sale_price_in_sale);
        $("#total_price").val(total_price);
    });
    $('input#sale_count').keyup(function (){
        let sale_count = $("#sale_count").val().replace(/,/g, "");
        let unit_sale_price_in_sale = $("#unit_sale_price_in_sale").val().replace(/,/g, "");
        let total_price = separate(sale_count * unit_sale_price_in_sale);
        $("#total_price").val(total_price);
    });
    $('input#unit_sale_price_in_sale').keyup(function (){
        let sale_count = $("#sale_count").val().replace(/,/g, "");
        let unit_sale_price_in_sale = $("#unit_sale_price_in_sale").val().replace(/,/g, "");
        let total_price = separate(sale_count * unit_sale_price_in_sale);
        $("#total_price").val(total_price);
    });


})
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
