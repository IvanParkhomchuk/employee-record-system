<?php
    namespace core;

    use controllers\MainController;

    class Core {
        public static $instance = null;
        public $app;
        public $pageParams;
        public $requestMethod;
        public $db;

        public function __construct() {
            $this->app = [];
        }

        public static function getInstance() {
            if (empty(self::$instance)) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        public function Initialize()
        {
            session_start();

            $this->db = new DB(DATABASE_HOST, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE_DBNAME);

            if (!file_exists('backup')) {
                mkdir('backup', 0777, true);
            }

            $backupArray = scandir('backup/');
            $backupFile = array_diff($backupArray, array('.', '..'));

            if (!empty($backupFile)) {
                $file_path = "backup/" . end($backupFile);
                $file_mtime = filemtime($file_path);
                $current_time = time();
                $time_difference = $current_time - $file_mtime;
                $hours = floor($time_difference / 3600);

                if ($hours > 168) {
                    unlink($file_path);

                    $backupFileName = "backup/backup_" . date('Y-m-d') . '.sql';
                    $backupFile = fopen($backupFileName, 'w');
                    fclose($backupFile);

                    $backupFilePath = $backupFileName;

                    exec("mysqldump --user=" . DATABASE_LOGIN . " --password=" . DATABASE_PASSWORD . " --host=" . DATABASE_HOST . " " . DATABASE_DBNAME . " --result-file={$backupFilePath}");
                }
            } else {
                $backupFileName = "backup/backup_" . date('Y-m-d') . '.sql';
                $backupFile = fopen($backupFileName, 'w');
                fclose($backupFile);
            }

            $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        }

        public function Run() {
            $route = $_GET['route'];

            $routeParts = explode('/', $route);

            $moduleName = strtolower(array_shift($routeParts));
            $actionName = strtolower(array_shift($routeParts));

            if (empty ($moduleName)) $moduleName = 'main';
            if (empty ($actionName)) $actionName = 'index';

            $this->app['moduleName'] = $moduleName;
            $this->app['actionName'] = $actionName;

            $controllerName = '\\controllers\\' . ucfirst($moduleName) . 'Controller';
            $controllerActionName = $actionName . 'Action';

            $statusCode = 200;

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $controllerActionName)) {
                    $actionResult = $controller->$controllerActionName($routeParts);

                    $this->pageParams['content'] = $actionResult;
                } else $statusCode = 404;
            } else $statusCode = 404;

            $statusCodeType = intval($statusCode / 100);
            if ($statusCodeType == 4 || $statusCodeType == 5) {
                $mainController = new MainController();

                $this->pageParams['content'] = $mainController->errorAction($statusCode);
            }
        }

        public function Done() {
            $pathToLayout = "themes/light/layout.php";
            $tpl = new Template($pathToLayout);
            $tpl->setParams($this->pageParams);
            echo $tpl->getHTML();
        }
    }