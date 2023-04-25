<?php
    namespace controllers;

    use core\Controller;
    use core\Core;
    use models\Department;
    use models\Position;

    class PositionController extends Controller {
        public function indexAction() {
            if ($_SESSION['department_id']) {
                $rows = Position::getSomePositions($_SESSION['department_id']);
            } else {
                $rows = Position::getPositions();
            }

            $viewPath = null;

            return $this->render($viewPath, [
                'rows' => $rows
            ]);
        }

        public function viewAction($params) {
            $_SESSION['position_id'] = intval($params[0]);

            $this->redirect("/employee");
        }

        public function addAction() {
            $departments = Department::getDepartments();

            if (Core::getInstance()->requestMethod === 'POST') {
                $errors = [];

                $_POST['name'] = trim($_POST['name']);

                if (empty($_POST['name']))
                    $errors['name'] = 'Назва категорії не вказана';

                if (empty($errors)) {
                    Position::addPosition($_POST);

                    return $this->redirect('/position/index');
                } else {
                    return $this->render(null, [
                        'errors' => $errors,
                        'departments' => $departments,
                    ]);
                }
            }

            return $this->render(null, [
                'departments' => $departments,
            ]);
        }

        public function editAction($params) {
            $id = intval($params[0]);

            if ($id > 0) {
                $position = Position::getPositionById($id);

                if (Core::getInstance()->requestMethod === 'POST') {
                    $errors = [];

                    $_POST['name'] = trim($_POST['name']);

                    if (empty($errors)) {
                        Position::updatePosition($id, $_POST['name']);

                        return $this->redirect('/position/index');
                    } else {
                        return $this->render(null, [
                            'errors' => $errors,
                            'position' => $position
                        ]);
                    }
                }

                return $this->render(null, [
                    'position' => $position
                ]);
            }
        }

        public function deleteAction($params) {
            $id = intval($params[0]);
            $yes = boolval($params[1] === 'yes');

            if ($id > 0) {
                $position = Position::getPositionById($id);

                if ($yes) {
                    Position::deletePosition($id);

                    return $this->redirect('/position');
                }

                return $this->render(null, [
                    'position' => $position
                ]);
            }
        }

    }