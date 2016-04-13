At the moment it needs some instructions handed coded in order that all works properly:

1)Add src/Traits/HappybirthdayUserTrait to User eloquent model class.

2)Insert this instruction inside the default constructor of User eloquent model class:

    $this->table = config('happybirthday.database.table.name');

