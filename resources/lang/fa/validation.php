<?php
return [
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
    'accepted'             => ':attribute باید پذیرفته شده باشد.',
    'active_url'           => 'آدرس :attribute معتبر نیست',
    'after'                => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal'       => ':attribute باید تاریخی بعد از :date، یا مطابق با آن باشد.',
    'alpha'                => ':attribute باید فقط حروف الفبا باشد.',
    'alpha_dash'           => ':attribute باید فقط حروف الفبا، عدد و خط تیره(-) باشد.',
    'alpha_num'            => ':attribute باید فقط حروف الفبا و عدد باشد.',
    'array'                => ':attribute باید صحیح باشد.',
    'before'               => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal'      => ':attribute باید تاریخی قبل از :date، یا مطابق با آن باشد.',
    'between'              => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file'    => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string'  => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array'   => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean'              => 'فیلد :attribute فقط می‌تواند صحیح و یا غلط باشد',
    'confirmed'            => ':attribute با فیلد تکرار مطابقت ندارد.',
    'date'                 => ':attribute یک تاریخ معتبر نیست.',
    'date_format'          => ':attribute با الگوی :format مطاقبت ندارد.',
    'different'            => ':attribute و :other باید متفاوت باشند.',
    'digits'               => ':attribute باید :digits رقم باشد.',
    'digits_between'       => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions'           => 'ابعاد تصویر :attribute قابل قبول نیست.',
    'distinct'             => 'فیلد :attribute تکراری است.',
    'email'                => ':attribute باید یک ایمیل معتبر باشد',
    'exists'               => ':attribute انتخاب شده، معتبر نیست.',
    'file'                 => ':attribute باید یک فایل باشد',
    'filled'               => 'فیلد :attribute الزامی است',
    'image'                => ':attribute می بایست معتبر باشد.',
    'in'                   => ':attribute انتخاب شده، معتبر نیست.',
    'in_array'             => 'فیلد :attribute در :other وجود ندارد.',
    'integer'              => ':attribute باید عدد صحیح باشد.',
    'ip'                   => ':attribute باید IP معتبر باشد.',
    'ipv4'                 => ':attribute باید یک آدرس معتبر از نوع IPv4 باشد.',
    'ipv6'                 => ':attribute باید یک آدرس معتبر از نوع IPv6 باشد.',
    'json'                 => 'فیلد :attribute باید یک رشته از نوع JSON باشد.',
    'max'                  => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file'    => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string'  => ':attribute نباید بیشتر از :max کاراکتر باشد.',
        'array'   => ':attribute نباید بیشتر از :max آیتم باشد.',
    ],
    'mimes'                => ':attribute باید یکی از فرمت های :values باشد.',
    'mimetypes'            => ':attribute باید یکی از فرمت های :values باشد.',
    'min'                  => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file'    => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string'  => ':attribute نباید کمتر از :min کاراکتر باشد.',
        'array'   => ':attribute نباید کمتر از :min آیتم باشد.',
    ],
    'not_in'               => ':attribute انتخاب شده، معتبر نیست.',
    'numeric'              => ':attribute باید عدد باشد.',
    'present'              => 'فیلد :attribute باید در پارامترهای ارسالی وجود داشته باشد.',
    'regex'                => 'فرمت :attribute معتبر نیست',
    'required'             => 'فیلد :attribute الزامی است',
    'required_if'          => 'هنگامی که :other برابر با :value است، فیلد :attribute الزامی است.',
    'required_unless'      => 'فیلد :attribute ضروری است، مگر آنکه :other در :values موجود باشد.',
    'required_with'        => 'در صورت وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_with_all'    => 'در صورت وجود فیلدهای :values، فیلد :attribute الزامی است.',
    'required_without'     => 'در صورت عدم وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_without_all' => 'در صورت عدم وجود هر یک از فیلدهای :values، فیلد :attribute الزامی است.',
    'same'                 => ':attribute و :other باید مانند هم باشند.',
    'size'                 => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file'    => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string'  => ':attribute باید برابر با :size کاراکتر باشد.',
        'array'   => ':attribute باید شامل :size آیتم باشد.',
    ],
    'string'               => 'فیلد :attribute باید متن باشد.',
    'timezone'             => 'فیلد :attribute باید یک منطقه زمانی قابل قبول باشد.',
    'unique'               => ':attribute قبلا انتخاب شده است.',
    'uploaded'             => 'آپلود فایل :attribute موفقیت آمیز نبود.',
    'url'                  => 'فرمت آدرس :attribute اشتباه است.',

    'iran_mobile' => 'شماره موبایل نامعتبر است',

    'exist_price' => 'قیمت با نوع کاربر و ویژگی های مشابه وجود دارد',

    'not_delete_able' => ':label قابل حذف نیست. وابستگی وجود دارد',

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
    'custom'      => [

    ],
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
    'attributes'  => [
        'mobile'          => 'شماره موبایل',
        'phone'           => 'شماره ثابت',
        'username'        => 'نام کاربری',
        'email'           => 'ایمیل',
        'name'            => 'نام',
        'family'          => 'فامیل',
        'card_number'     => 'شماره کارت بانکی',
        'sheba_number'    => 'شماره شبای حساب',
        'national_code'   => 'کدملی',
        'accounting_code' => 'کد حسابداری',

        'user_score'       => 'امتیاز',
        'icon'             => 'آیکن',
        'marketer_level'   => 'سظح بازاریابی',
        'marketer_percent' => 'مقدار سطح درصدی',

        'horizontal'       => 'تصویر افقی',
        'vertical'         => 'تصویر عمودی',
        'factor'           => 'ضریب',
        'product_status'   => 'وضعیت محصول',
        'prices_status'    => 'وضعیت قیمت',
        'brand_id'         => 'شناسه برند',
        'code'             => 'کد',
        'stock_unit'       => 'واحد اصلی موجودی',
        'search_tags'      => 'تگ های جستجو',
        'basic_color'      => 'رنگ پیشفرض',
        'sort'             => 'مرتب ساز',
        'seo_description'  => 'توضیح سئو',
        'seo_keyword'      => 'کیورد سئو',
        'attribute_values' => 'ویژگی',

        'stock'              => 'موجودی',
        'short_description'  => 'توضیح کوتاه',
        'max_purchase_limit' => 'حداکثر تعداد سفارش',
        'min_purchase_limit' => 'حداقل تعداد سفارش',
        'amount'             => 'قیمت',
        'discount_amount'    => 'قیمت تخفیف خورده',
        'reserved_percent'   => 'درصد رزرو شده',
        'supplier_id'        => 'عرضه کننده',
        'product_id'         => 'محصول',
        'unit_id'            => 'واحد',

        'en_name'     => 'عنوان انگلیسی',
        'area_code'   => 'پیش شماره',
        'longitude'   => 'طول جغرافیایی',
        'latitude'    => 'عرض جغرافیایی',
        'postal_code' => 'کدپستی',

        'photo' => 'تصویر',

        'password'              => 'رمز عبور',
        'password_confirmation' => 'تکرار رمز عبور',

        'city'           => 'شهر',
        'province'       => 'استان',
        'city_id'        => 'شهر',
        'province_id'    => 'استان',
        'county_id'      => 'شهرستان',
        'country'        => 'کشور',
        'address_detail' => 'جزییات آدرس',
        'zip_code'       => 'کد پستی',

        'address' => 'آدرس',
        'age'     => 'سن',
        'gender'  => 'جنسیت',
        'kind'    => 'نوع',

        'date'   => 'تاریخ',
        'time'   => 'زمان',
        'day'    => 'روز',
        'month'  => 'ماه',
        'year'   => 'سال',
        'hour'   => 'ساعت',
        'minute' => 'دقیقه',
        'second' => 'ثانیه',

        'title'       => 'عنوان',
        'title_fa'    => 'عنوان فارسی',
        'title_en'    => 'عنوان انگلیسی',
        'slug'        => 'اسلاگ',
        'text'        => 'متن',
        'content'     => 'محتوا',
        'description' => 'توضیحات',
        'short_desc'  => 'توضیح کوتاه',
        'long_desc'   => 'توضیح کامل',

        'price' => 'قیمت',

        'category_id' => 'دسته بندی',
        'parent_id'   => 'دسته بندی پدر',

        'permissions'   => 'مجوزها',
        'permission_id' => 'مجوز',
        'roles'         => 'سطوح دسترسی',
        'role_id'       => 'سطح دسترسی',
        'admins'        => 'ادمین',
        'admin_id'      => 'ادمین',

        'desc' => 'توضیح',
        'type' => 'نوع',

        'number_of_days'     => 'تعداد روز',
        'number_of_list'     => 'تعداد لیست اختصاصی',
        'number_of_branch'   => 'تعداد شعبه',
        'fine_amount'        => 'میزان جریمه',
        'deposits_price'     => 'قیمت ودیعه',
        'rental_price'       => 'قیمت اجاره',
        'extra_list_price'   => 'قیمت خرید لیست اضافی',
        'extra_branch_price' => 'قیمت خرید شعبه اضافی',
        'type_ids'           => 'انواع شغلی',
        'role_ids'           => 'نقش ها',
        'category_ids'       => 'دسته بندی',
        'subject'            => 'موضوع',
        'expires_type'       => 'نوع منقضی',
        'expires_time'       => 'مقدار منقضی',

        'repeat' => 'تکرار',
    ],

    'category' => [
        'level_parent_id' => 'طبق نوع انتخابی, والد انتخابی در سطح آخر است.'
    ]
];
