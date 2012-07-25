<?php 

class User extends CActiveRecord
{
    // Сценарий регистрации
    const SCENARIO_SIGNUP = 'signup';

    // Повторный пароль нужно объявить, т.к. этого поля нет в БД
    public $password_repeat;
	public $day_of_birth, $month_of_birth, $year_of_birth;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'user';
    }

    // Правила проверки входящих данных
    public function rules()
    {
        return array(
            // Логин и пароль - обязательные поля
            array('login, password', 'required'),
            // Длина логина должна быть в пределах от 5 до 30 символов
            array('login', 'length', 'min'=>5, 'max'=>30),
            // Логин должен соответствовать шаблону
            array('login', 'match', 'pattern'=>'/^[A-z][\w]+$/'),
            // Логин должен быть уникальным
            array('login', 'unique'),
            // Длина пароля не менее 6 символов
            array('password', 'length', 'min'=>6, 'max'=>30),
            // Повторный пароль и почта обязательны для сценария регистрации
            array('password_repeat, email', 'required', 'on'=>self::SCENARIO_SIGNUP),
            // Длина повторного пароля не менее 6 символов
            array('password_repeat', 'length', 'min'=>6, 'max'=>30),
            // Пароль должен совпадать с повторным паролем для сценария регистрации
            array('password', 'compare', 'compareAttribute'=>'password_repeat', 'on'=>self::SCENARIO_SIGNUP),
            // Почта проверяется на соответствие типу
            array('email', 'email', 'on'=>self::SCENARIO_SIGNUP),
            // Почта должна быть в пределах от 6 до 50 символов
            array('email', 'length', 'min'=>6, 'max'=>50),
            // Почта должна быть уникальной
            array('email', 'unique'),
            // Почта должна быть написана в нижнем регистре
            array('email', 'filter', 'filter'=>'strtolower'),
			// Объявление email_visible (TRUE FALSE)
			array('email_visible', 'default'),
			// О себе - ограничение на максимальное количество символов.
			array('about', 'length', 'max'=>550),
			// Соответствие щаблону - MAN or FAMILY
			array('sex', 'match', 'pattern'=>'(M|F)'),
			// День рождения в формате в формате DATE MM/dd/yyyy
			array('birth_day', 'default'),
        );
    }

    // Метки атрибутов
    public function attributeLabels()
    {
        return array(
            'login' => 'Логин:',
            'password' => 'Пароль:',
            'password_repeat' => 'Повторите пароль:',
            'email' => 'e-mail:',
			'sex' => 'Пол:',
			'birth_day' => 'День рожденья:',
			'about' => 'Напишите немного о себе:',
        );
    }

    // Метод, который будет вызываться до сохранения данных в БД
    protected function beforeSave()
    {
         if(parent::beforeSave())
         {
            if($this->isNewRecord)
            {
                // Время регистрации
                $this->register_datetime = time();
                // Хешировать пароль
                $this->password = $this->hashPassword($this->password);
            }

            return true;
         }

        return false;
    }

    public function hashPassword($password)
    {
        return md5($password);
    }
}