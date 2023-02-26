<?php
    require_once "AutoLoad.php";

    use vendor\Spoke;
    use vendor\AppLogger;
    use vendor\Request;

    $spoke = new Spoke("Matin");
    $wellcome = new vendor\WellCome();
    $hello = new vendor\Hello();
    $salam = new vendor\Salam();
    $app_logger = new AppLogger();
    $logger = new vendor\Logger();
    $request = new Request();

    $spoke->use(match($request->input("say")) {
        "wellcome" => $wellcome,
        "hello" => $hello,
        "salam" => $salam,
        default => $spoke->setName($wellcome, $request->input("say"))
    });

    $spoke->start();
    $spoke->pre_start();
    $spoke->laugh("Matin");
    $app_logger->setLogger($logger);
    $app_logger->getLogger()->log("chotolibebe");
    $app_logger->setLogger(
        new class implements vendor\LoggerI {
            public function log(string $messege) {
                echo($messege . "2!!!</br>");
            }
        }
    );
    $app_logger->getLogger()->log("chotolibebe");


    //abstract فقط میتوان از شئ آن ارث بری کرد مستقیم نمیتوان ساخت و اگر به تابعی بدهیم حتما باید در شئ فرزند دوباره نویسی شود
    //trait اگر بخواهیم در کنار ارث بری از توابع شی دیگر استفاده کنیم
    //final ارث بری را ممنوع میکند واگر در تابع استفاده شود دوباره نویسی آن را محدود می کند
    //stdClass کلاس آماده در  php
    //magic function توابع آماده در php
    //clone شئ هارا کپی می کند مجیک متد دارد
    //serialize تبدیل شئ به رشته برای ذخیره سازی مجیک متد دارد
    //unserialize تبدیل رشته به شئ مجیک متد دارد
    //file_put_content کار باز کزدن فایل و ریختن اطلاعات در آن را انجام میدهد
    //file_get_content کار باز کزدن فایل و خواندن اطلاعات از آن را انجام میدهد
    //instanceof خروجی اش نوع شئ ورودی است $obj instanceof
    //nullsafe اگر شئ یوزری وجود داشت بعد بقیشو ادامه میده $user?->login();
    //function login(?string $name, string|int $password, mixed $all) میگه ارگومنت های تابع اولی یا null یا متن باشه دومی یا متن یا عدد باشه سومی میگه همه چی باشه
    //$var ?? var_dump("$var is null"); ?? یعنی ایا سمت چپ آن null است
    //$variable = $var ?? "ok";
    //$variable = $var ?? throw new Exception('Division by zero.');

    //کلید لیست شئ میشود
    // $s = new SplObjectStorage();
    // $o1 = new stdClass;
    // $s[$o1] = "ali";

    //کلید لیست شئ میشود
    // $s = new WeakMap();
    // $o1 = new stdClass;
    // $s[$o1] = "ali";

    //$var = "ok"; function myfunc() use ($var) {var_dump($var);} اوکی را چاپ می کند

    //fn($item) => $item * 2; 
    //function($item) {return $item * 2;}

    //^0.2.1 فقط پچ هارا آپدیت می کند
    //^1.2.1 همه را غر از عدد اول آپدیت می کند
    //~1.2.1 آخرین عدد را آپدیت میکن
    //>= 1.2.1 هر چیزی ورژنی بزرگ تر از آن را آپدیت میکند
    //1.2.1 فقط این ورژن را نصب میکند

    //composer dumpautoload اتولود کامپوزر را دوباره میسازد از روی جیسان
    // "autoload": {
    //     "psr-4": {
    //         "App\\": "app/"
    //     }
    // }

    //composer install اگر پوشه وندور رو پاک کرده باشیم ایجاد میکند
    
?>
