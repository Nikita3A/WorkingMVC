<?php

namespace app\controllers;
use app\models\Birthday;
use app\Router;

class MainController
{
    public function index(Router $router)
    {
        $thisMonth = $_GET['thisMonth'] ?? '';
        $birthdays = $router->db->getBirthdays($thisMonth); 
        $router->renderView('birthday_view/index', 
        [   'birthdays' => $birthdays,
            'thisMonth' => $thisMonth
        ]);
    }

    public function addBirthday(Router $router)
    {
        $birthdayData = [
            'name' => '',
            'date' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $birthdayData['name'] = $_POST['name'];
            $birthdayData['date'] = $_POST['date'];

            $birthday = new Birthday();
            $birthday->load($birthdayData);
            $errors = $birthday->save();
            if (empty($errors))
            {
                header('Location: /birthday_view');
                exit;
            }
        }
        $router->renderView('birthday_view/addBirthday', [
            'birthday' => $birthdayData
        ]);
    }

    public function change(Router $router)
    {
        $errors = [];
        $id = $_GET['id'] ?? null;
        if (!$id)
        {
            header('Location: /birthday_view');
            exit;
        }
        $birthdayData = $router->db->getBirthdayById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $birthdayData['name'] = $_POST['name'];
            $birthdayData['date'] = $_POST['date'];

            $birthday = new Birthday();
            $birthday->load($birthdayData);
            $errors = $birthday->save();
            if (empty($errors))
            {
                header('Location: /birthday_view');
                exit;
            }

        }

        $router->renderView('birthday_view/change', [
            'birthday' => $birthdayData,
            'errors' => $errors
        ]);
    }    

    public function delete(Router $router)
    {
        $id = $_POST['id'] ?? null;
        if (!$id)
        {
            header('Location: /birthday_view');
            exit;
        }
        $router->db->deleteBirthday($id);
        header('Location: /birthday_view');
    }
}