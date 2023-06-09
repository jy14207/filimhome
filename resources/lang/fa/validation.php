<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    "jdate"          => ":attribute اشتباه وارد شده است",
    "jdate"          => ":attribute اشتباه وارد شده است",
    "eng"          => "کیبورد خود را در حالت انگلیسی قرار دهید",
    "accepted"         => ":attribute باید پذیرفته شده باشد.",
    "active_url"       => "آدرس :attribute معتبر نیست",
    "after"            => ":attribute باید تاریخی بعد از :date باشد.",
    "alpha"            => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
    "alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد.",
    "array"            => ":attribute باید شامل آرایه باشد.",
    "before"           => ":attribute باید تاریخی قبل از :date باشد.",
    "between"          => array(
        "numeric" => ":attribute باید بین :min و :max باشد.",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد.",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد.",
        "array"   => ":attribute باید بین :min و :max آیتم باشد.",
    ),
    "boolean"          => "The :attribute field must be true or false",
    "confirmed"        => ":attribute با تاییدیه مطابقت ندارد.",
    "date"             => ":attribute یک تاریخ معتبر نیست.",
    "date_format"      => ":attribute با الگوی :format مطاقبت ندارد.",
    "different"        => ":attribute و :other باید متفاوت باشند.",
    "digits"           => ":attribute باید :digits رقم باشد.",
    "digits_between"   => ":attribute باید بین :min و :max رقم باشد.",
    "email"            => "فرمت :attribute معتبر نیست.",
    "exists"           => ":attribute انتخاب شده، معتبر نیست.",
    "image"            => ":attribute باید تصویر باشد.",
    "in"               => ":attribute انتخاب شده، معتبر نیست.",
    "integer"          => ":attribute باید عدد باشد.",
    "ip"               => ":attribute باید IP آدرس معتبر باشد.",
    "max"              => array(
        "numeric" => ":attribute نباید بزرگتر از :max باشد.",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
    ),
    "mimes"            => ":attribute باید یکی از فرمت های :values باشد.",
    "min"              => array(
        "numeric" => ":attribute نباید کوچکتر از :min باشد.",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد.",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد.",
    ),
    "not_in"           => ":attribute انتخاب شده، معتبر نیست.",
    "numeric"          => ":attribute باید شامل عدد باشد.",
    "regex"            => ":attribute یک فرمت معتبر نیست",
    "required"         => "فیلد :attribute الزامی است",
    "required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    "required_with"    => ":attribute الزامی است زمانی که :values موجود است.",
    "required_with_all"=> ":attribute الزامی است زمانی که :values موجود است.",
    "required_without" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "same"             => ":attribute و :other باید مانند هم باشند.",
    "size"             => array(
        "numeric" => ":attribute باید برابر با :size باشد.",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد.",
        "array"   => ":attribute باسد شامل :size آیتم باشد.",
    ),
    "timezone"         => "The :attribute must be a valid zone.",
    "unique"           => ":attribute قبلا انتخاب شده است.",
    "url"              => "فرمت آدرس :attribute اشتباه است",
    "rules_agreement"   => "باید گزینه موافقت با قوانین را انتخاب کنید",
    "codemelli"        =>   ":attribute اشتباه وارد شده است",
    "mobile_numbers"     =>"شماره موبایل صحیح نیست",
    "mobile"     =>"شماره موبایل صحیح نیست",
    "jdatetime"     =>":attribute اشتباه وارد شده است",
    "hash"     =>"رمز عبور فعلی اشتباه وارد شده است",
    "complex_password"     =>"رمز عبور باید حاوی حداقل یک حرف کوچک ، یک حرف بزرگ و یک عدد باشد",



    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => array(
        'answer.*' => [
            'required' => 'وارد کردن همه فیلد های پاسخ الزامی است',
        ]
    ),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => array(
        "stocks_count" => "تعداد سهام",
        "purchase_signal_count" => "تعداد جایگاه خرید",
        "support_start" => "تاریخ شروع پشتیبانی",
        "support_end" => "تاریخ اتمام پشتیبانی",
        "name" => "نام",
        "username" => "نام کاربری",
        "email" => "پست الکترونیکی",
        "first_name" => "نام",
        "last_name" => "نام خانوادگی",
        "password" => "رمز عبور",
        "password_confirmation" => "تاییدیه ی رمز عبور",
        "city" => "شهر",
        "country" => "کشور",
        "phone" => "تلفن",
        "mobile" => "تلفن همراه",
        "age" => "سن",
        "sex" => "جنسیت",
        "gender" => "جنسیت",
        "day" => "روز",
        "month" => "ماه",
        "year" => "سال",
        "hour" => "ساعت",
        "minute" => "دقیقه",
        "second" => "ثانیه",
        "title" => "عنوان",
        "text" => "متن",
        "content" => "محتوا",
        "description" => "توضیحات",
        "excerpt" => "گلچین کردن",
        "date" => "تاریخ",
        "bornDate" => "تاریخ تولد",
        "time" => "زمان",
        "available" => "موجود",
        "size" => "اندازه",
        "insertDate" => "تاریخ ایجاد",
        "respiteDate" => "تاریخ مهلت",
        "firstName" => "نام",
        "lastName" => "نام خانوادگی",
        "img" => "عکس پرسنلی",
        "guild" => "اتحادیه",
        "guildId" => "کد اتحادیه",
        "fatherName" => "نام پدر",
        "shsh" => "شماره شناسنامه",
        "jobTitle" => "عنوان شغل",
        "address" => "آدرس",
        "tel" => "تلفن",
        "paymentRefId" => "شماره فیش واریزی",
        "paymentDate" => "تاریخ واریز",
        "nickName" => "نام",
        "nickname" => "نام",
        "firstname" => "نام",
        "lastname" => "نام خانوادگی",
        "secretaryId" => "کد منشی",
        "start_datetime" => "زمان شروع",
        "end_datetime" => "زمان پایان",
        //-------------------------
        "customer_name" => "نام مشتری",
        "website_name"=>"عنوان وب سایت",
        "customer_mobile"=>"شماره موبایل",
        "customer_email"=>"آدرس ایمیل مشتری",
        "admin_password"=>"رمز عبور",
        //     فیلد های جدول مددجو
        'national_code'     =>  'کد ملی',
        'categoryname'     =>  'نام دسته',
        'name'     =>  'نام ونام خانوادگی ',
        'family_members'     =>  'تعداد اعضای خانوار ',
        'gender'     =>  'جنسیت ',
        'birthday'     =>  'تاریخ تولد ',
        'mobile'     =>  'تلفن همراه',
        'tell'     =>  'تلفن ',
        'city_id'     =>  'شهر ',
        'address'     =>  'آدرس ',
            //        فیلد های جدول bill
        'bill_no'     =>  'شماره بارنامه ',
        'branch_id'     =>  'شعبه  ',
        'max_allowed_price'     =>  'سقف مجاز  ',
        'bill_date'     =>  ' تاریخ بارنامه',
        'start_date'     =>  ' تاریخ حرکت ',
        'start_time'     =>  'زمان حرکت ',
        'exit_receipt_date'     =>  ' تاریخ قبض خروج کالا ',
        'exit_receipt_number'     =>  ' شماره قبض خروج کالا ',
        'driver_name'     =>  '  نام راننده ',
        'cartag_iran'     =>  ' پلاک ',
        'car_tag_right'     =>  ' پلاک ',
        'car_tag_center'     =>  ' پلاک ',
        'car_tag_left'     =>  'پلاک  ',
        'origin'     =>  'مبدا ',
        'destination'     =>  'مقصد ',
        'product_amount'     =>  'مقدار کالا  ',
        'product_price'     =>  ' ارزش کالا ',
        'product_id'     =>  ' نوع کالا ',
        'vichle_id'     =>  ' نوع کالا ',
        'user_name'     =>  ' نام کاربری ',
        'company_id'     =>  ' نام شرکت ',
        'insurance_price'     =>  ' نرخ بیمه ',
        'license_number'     =>  ' نام شعبه ',
        'vichle_id'     =>  ' نوع خودرو ',
        'cartag_iran'     =>  ' پلاک خودرو ',
        'car_tag_right'     =>  ' پلاک خودرو ',
        'car_tag_center'     =>  ' پلاک خودرو ',
        'car_tag_left'     =>  ' پلاک خودرو ',
        'code'     =>  ' این کد ',
    ),
);
