$(document).ready(function () {
    $('.select2-search-madadjoo').select2({
        placeholder: "",
        "language": {
            "noResults": function () {
                return "نتیجه ای یافت نشد! (جستجو بر اساس کد یا نام کالا)";
            },
            "searching": function () {
                return "در حال جستجو. . .";
            },
        },
        ajax: {
            url: '/mali/select2_get_commodity_id',
            dataType: 'json',
            type: 'GET',
            delay: 250,
            processResults: function (data) {
                // console.log(data);
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
})
