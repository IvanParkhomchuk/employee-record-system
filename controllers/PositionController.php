<?php
    namespace controllers;

    use core\Controller;
    use core\Core;
    use models\Employee;
    use models\Position;

    class PositionController extends Controller {
        public function indexAction() {
            $rows = Position::getPositions();
            $viewPath = null;

            return $this->render($viewPath, [
                'rows' => $rows
            ]);
        }

        public function viewAction($params) {
            $id = intval($params[0]);
            $position = Position::getPositionById($id);
            $employees = Employee::getEmployeesInPosition($id);

            return $this->render(null, [
                'position' => $position,
                'employees' => $employees
            ]);
        }

        public function addAction() {
            if (Core::getInstance()->requestMethod === 'POST') {
                $errors = [];

                $_POST['name'] = trim($_POST['name']);

                if (empty($_POST['name']))
                    $errors['name'] = 'Назва категорії не вказана';

                if (empty($errors)) {
                    Position::addPosition($_POST['name']);

                    return $this->redirect('/position/index');
                } else {
                    $model = $_POST;

                    return $this->render(null, [
                        'errors' => $errors,
                        'model' => $model
                    ]);
                }
            }

            return $this->render();
        }
    }