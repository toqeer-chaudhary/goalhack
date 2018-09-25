<?php


namespace App\Helpers;


use App\Globals\Globals;
use ReflectionClass;

class Helpers
{
    /**
     * function to call build function
     *
     * @param  void
     * @return controller's name and their behaviors
     */

    public function resources()
    {
//        creating hard coded array of actions
        $hardCodedActions = ["index","show","update","destroy","store","assignVisionView",
            "assignStrategyView","assignKpiView","assignGoalView","details","updateGoalData",
            "blockUserList","visionDashboard","strategyDashboard","kpiDashboard","goalDashboard","goalDataDashboard"];
        // fetching all the controller names from the globals file
        // and storing it inside a variable to run foreach loop on it.
        $allResources = Globals::$PUBLIC_RESOURCES;

        foreach ($allResources as $resource) {
            // calling build method of the current class and storing
            // values in  an array of instances.
            $instance[] = $this->build($resource);
        }

        // initiating foreach loop on the instance array as a key pair value
        foreach ($instance as $index => $value) {
            $classNames = preg_split('[\b]', $value->name);
//            dd($classNames);
            $allControllerNames =  $classNames[7];
            // dd ($allControllerNames);
            $methods = get_class_methods($value->name);
            // running foreach on $allMethods
            foreach ($methods as $method) {
////                checking if the current method is in the hard code array of resources or not
              if (in_array($method,$hardCodedActions))
              {
                  $allMethods[] = $method;
              }
              else
              {
                  continue;
              }
            }
            //dd ($allMethods);
            $controllerAndActions[$allControllerNames] = $allMethods;
            // awesome logic
//            emptying the array after each outer loop iteration
            $allMethods = null;
        }

             //  dd($controllerAndActions);
            return $controllerAndActions;

    }

    /**
     * function to build reflections
     *
     * @param  Class's Name  $className
     * @return classe's all methods and properties
     */
    function build($className)
    {
        $reflector = new ReflectionClass($className);
        return $reflector;
    }

}