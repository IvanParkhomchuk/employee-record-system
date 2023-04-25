<?php
    namespace controllers;

    use core\Controller;
    use core\Core;
    use models\District;

    class DistrictController extends Controller {
        public function indexAction() {
            $rows = District::getDistricts();
            $viewPath = null;

            return $this->render($viewPath, [
                'rows' => $rows
            ]);
        }

        public function viewAction($params) {
            $_SESSION['district_id'] = intval($params[0]);

            $this->redirect("/department");
        }

        public function addAction() {
            if (Core::getInstance()->requestMethod === 'POST') {
                $errors = [];

                $_POST['name'] = trim($_POST['name']);

                if (empty($errors)) {
                    District::addDistrict($_POST['name']);

                    return $this->redirect('/district/index');
                } else {
                    return $this->render(null, [
                        'errors' => $errors,
                    ]);
                }
            }

            return $this->render();
        }

        public function editAction($params) {
            $id = intval($params[0]);

            if ($id > 0) {
                $district = District::getDistrictById($id);

                if (Core::getInstance()->requestMethod === 'POST') {
                    $errors = [];

                    $_POST['name'] = trim($_POST['name']);

                    if (empty($errors)) {
                        District::updateDistrict($id, $_POST['name']);

                        return $this->redirect('/district/index');
                    } else {
                        return $this->render(null, [
                            'errors' => $errors,
                            'district' => $district
                        ]);
                    }
                }

                return $this->render(null, [
                    'district' => $district
                ]);
            }
        }

        public function deleteAction($params) {
            $id = intval($params[0]);
            $yes = boolval($params[1] === 'yes');

            if ($id > 0) {
                $district = District::getDistrictById($id);

                if ($yes) {
                    District::deleteDistrict($id);

                    return $this->redirect('/district');
                }

                return $this->render(null, [
                    'district' => $district
                ]);
            }
        }
    }