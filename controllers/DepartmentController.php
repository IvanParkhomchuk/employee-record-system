<?php
    namespace controllers;

    use core\Controller;
    use core\Core;
    use models\Department;
    use models\District;

    class DepartmentController extends Controller {
        public function indexAction() {
            if ($_SESSION['district_id']) {
                $rows = Department::getSomeDepartments($_SESSION['district_id']);
            } else {
                $rows = Department::getDepartments();
            }

            $viewPath = null;

            return $this->render($viewPath, [
                'rows' => $rows
            ]);
        }

        public function viewAction($params) {
            $_SESSION['department_id'] = intval($params[0]);

            $this->redirect("/position");
        }

        public function addAction() {
            $districts = District::getDistricts();

            if (Core::getInstance()->requestMethod === 'POST') {
                $errors = [];

                $_POST['name'] = trim($_POST['name']);

                if (empty($errors)) {
                    Department::addDepartment($_POST);

                    return $this->redirect('/department/index');
                } else {
                    return $this->render(null, [
                        'errors' => $errors,
                        'districts' => $districts,
                    ]);
                }
            }

            return $this->render(null, [
                'districts' => $districts,
            ]);
        }

        public function editAction($params) {
            $id = intval($params[0]);

            if ($id > 0) {
                $department = Department::getDepartmentById($id);

                if (Core::getInstance()->requestMethod === 'POST') {
                    $errors = [];

                    $_POST['name'] = trim($_POST['name']);

                    if (empty($errors)) {
                        Department::updateDepartment($id, $_POST['name']);

                        return $this->redirect('/department/index');
                    } else {
                        return $this->render(null, [
                            'errors' => $errors,
                            'department' => $department
                        ]);
                    }
                }

                return $this->render(null, [
                    'department' => $department
                ]);
            }
        }

        public function deleteAction($params) {
            $id = intval($params[0]);
            $yes = boolval($params[1] === 'yes');

            if ($id > 0) {
                $department = Department::getDepartmentById($id);

                if ($yes) {
                    Department::deleteDepartment($id);

                    return $this->redirect('/department');
                }

                return $this->render(null, [
                    'department' => $department
                ]);
            }
        }
    }