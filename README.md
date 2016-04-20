At the moment it needs some instructions handed coded in order that all works properly:

1)Add Willypuzzle\Happybirthday\Traits\HappybirthdayUserTrait to User eloquent model class.

 For example:

 use Willypuzzle\Happybirthday\Traits\HappybirthdayUserTrait;

    class User extends Authenticatable
    {
        use HappybirthdayUserTrait;

        ....
    }

2)Insert this instruction inside the default constructor of User eloquent model class, before parent constructor calling:

    $this->table = config('happybirthday.database.table.name');

 For example:

    class User extends Authenticatable
    {

         ...

        public function __construct()
        {
             $this->table = config('happybirthday.database.table.name');

             parent::__construct();
        }

        ...
    }

 After you have to do all is usual with a laravel plugin:

 1)Publish:

    php artisan vendor:publish

 2)Migrate (But you first could desire to modify default options in config/happybirthday.php, read following*):

    php artisan migrate

 3)Set provider in config/app.php (add it in 'providers' array entry):

    Willypuzzle\Happybirthday\HappybirthdayServiceProvider::class,

 4)Set alias for facade, always in config.app (add it in 'aliases' array entry):

    'Happybirthday' => Willypuzzle\Happybirthday\Facades\Happybirthday::class,

 Now you can use the plugin for logget users, just call:

    Happybirthday::isTodayBirthdayOfLoggedUser();

 Whenever you want.

 It returns a boolean if today is the birthday of logged user.

 Remember to set birthday date in database for the user otherwise it will returns always false. It return false if there is any user is logged.

 *For Default table for user is 'users' and birhday date field in the table is 'birthday', however you can change it by config/happybirthday.php config file. Change it before migrate.

 This plugin is based on scaffold plugin (it's the default auth plugin for laravel 5.2), so in order to use it you have to follow here -> https://laravel.com/docs/5.2/authentication.