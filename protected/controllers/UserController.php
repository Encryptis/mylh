<?php

class UserController extends CController
{
    // Действие по умолчанию. Выведем список пользователей.
    public function actionIndex()
    {
        // Получить список всех зарегестрированных пользователей...
        $users = User::model()->findAll();

        // ...и вывести их
        $this->render('users_list', array('users'=>$users));
    }

    // Действие регистрации
    public function actionSignup()
    {
        // Создать модель и указать ей, что используется сценарий регистрации
        $user = new User(User::SCENARIO_SIGNUP);

        // Если пришли данные для сохранения
        if(isset($_POST['User']))
        {
            // Безопасное присваивание значений атрибутам
            $user->attributes = $_POST['User'];

            // Проверка данных
            if($user->validate())
            {
                // Сохранить полученные данные
                // false нужен для того, чтобы не производить повторную проверку
                $user->save(false);

                // Перенаправить на список зарегестрированных пользователей
                $this->redirect($this->createUrl('user/'));
            }
        }

        // Вывести форму
        $this->render('form_signup', array('form'=>$user));
    }
} 