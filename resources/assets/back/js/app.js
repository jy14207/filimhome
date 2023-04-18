import './bootstrap';
// import 'jquery'
import '../../common/master';
import './my_scripts/master';

$(document).ready(function (){
    jalaliDatepicker.startWatch();
    $('#date').val(jalaliDatepicker.today);
    $('.alert').fadeOut(10000);
    let tagArr = document.getElementsByTagName("input");
    for (let i = 0; i < tagArr.length; i++) {
        tagArr[i].autocomplete = 'off';
    }

    //نمایش سایر در فرم ثبت دخل روزانه
    $('#resource').change(function (){
        if ($(this).val() == '5'){
            $('#description_div').removeClass('d-none');
        }
        else
            $('#description_div').addClass('d-none');

    })

})
































import {createApp} from 'vue';
/*const app = createApp({});
import ExampleComponent from './../components/ExampleComponent.vue';

app.component('example-component', ExampleComponent);
app.mount('#app');*/




