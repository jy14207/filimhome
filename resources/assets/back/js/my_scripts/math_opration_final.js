$(document).ready(function (){
    $("input#count").keyup(function (){
        let count= $("#count").val().replace(/,/g, "");
        let unit_buy_price= $("#unit_price").val().replace(/,/g, "");
        let unit_sale_price= $("#unit_sale_price").val().replace(/,/g, "");
        let vals = set_value(count, unit_buy_price, unit_sale_price);
        $('#total_price').val(separate(vals[0]));
        $('#total_sale_price').val(separate(vals[1]));
        $('#unit_sale_price_profit').html('سود حاصل از فروش یک قلم از کالا : ' + separate(vals[2] + 'تومان.'));
        $('#total_sale_price_profit').html('سود حاصل از فروش کل کالا : ' + separate(vals[3] + 'تومان.'));
        $('#profit_percent').val(separate(vals[4]+'%'));
    }) ;
    $("input#unit_price").keyup(function (){
        let count= $("#count").val().replace(/,/g, "");
        let unit_buy_price= $("#unit_price").val().replace(/,/g, "");
        let unit_sale_price= $("#unit_sale_price").val().replace(/,/g, "");
        let vals = set_value(count, unit_buy_price, unit_sale_price);
        $('#total_price').val(separate(vals[0]));
        $('#total_sale_price').val(separate(vals[1]));
        $('#unit_sale_price_profit').html('سود حاصل از فروش یک قلم از کالا : ' + separate(vals[2] + 'تومان.'));
        $('#total_sale_price_profit').html('سود حاصل از فروش کل کالا : ' + separate(vals[3] + 'تومان.'));
        $('#profit_percent').val(separate(vals[4]+'%'));
    }) ;
    $("input#unit_sale_price").keyup(function (){
        let count= $("#count").val().replace(/,/g, "");
        let unit_buy_price= $("#unit_price").val().replace(/,/g, "");
        // console.log(unit_buy_price);
        let unit_sale_price= $("#unit_sale_price").val().replace(/,/g, "");
        let vals = set_value(count, unit_buy_price, unit_sale_price);
        $('#total_price').val(separate(vals[0]));
        $('#total_sale_price').val(separate(vals[1]));
        $('#unit_sale_price_profit').html('سود حاصل از فروش یک قلم از کالا : ' + separate(vals[2] + 'تومان.'));
        $('#total_sale_price_profit').html('سود حاصل از فروش کل کالا : ' + separate(vals[3] + 'تومان.'));
        $('#profit_percent').val(separate(vals[4]+'%'));
    }) ;

});

function set_value(count, unit_buy_price, unit_sale_price){
    let total_buy_price = count * unit_buy_price;
    console.log(count);
    console.log(unit_buy_price);
    let total_sale_price = count * unit_sale_price;
    let unit_sale_price_profit = unit_sale_price - unit_buy_price;
    let total_sale_price_profit = total_sale_price - total_buy_price;
    let unit_sale_percent_profit = Math.round(((unit_sale_price * 100) / unit_buy_price)-100)   ;
    return ([total_buy_price, total_sale_price, unit_sale_price_profit,total_sale_price_profit, unit_sale_percent_profit ])
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
