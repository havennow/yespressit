<?php

namespace app\modules\CreateStatic\controllers;
use yii\web\Controller;


/**
 * Default controller for the `createstatic` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    private static function runCommand($command=null)
    {
        if($command!=null)
        {
            return shell_exec($command);

        }
        return false;

    }
    public function actionIndex($controller=null)
    {
        $application=false;
        if($controller!=null)
        {
            $_controller = $controller;
            $pathModule=$this->module->basePath;

            $template = $this->renderFile($pathModule.'/views/default/_template.php',['controller'=>$controller]);
            $controller = "app\\controllers\\".$controller."Controller";
            $application = self::runCommand('php /vagrant/yii gii/controller --controllerClass="'.$controller.'" --interactive=0 --overwrite=1');

        }

        return $this->render('index',['result'=>$application]);
    }

    public function actionRun($command=null)
    {

    }
}
