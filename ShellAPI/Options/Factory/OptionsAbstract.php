<?php
namespace ShellAPI\Options\Factory;

abstract class OptionsAbstract implements OptionsInterface
{
    /**
     * @author Jon taylor
     * @since 1.0
     * @define This method will allow retrieving stored options for
     *          easy streamline.
     * @param $request
     * @return mixed
     */
    static public function get($request)
    {
        $array = explode('.', $request);

        $options = self::getterObject($request);

        if($options->{$array[0]}->{$array[1]})
            return $options->{$array[0]}->{$array[1]};
        else
            return false;
    }

    /**
     * @author Jon taylor
     * @since 1.0
     * @define Partners the get method to direct where to find the values
     * @param $request
     * @return mixed
     */
    static protected function getterObject()
    {
        return self::json2object(self::root().DIRECTORY_SEPARATOR.'settings.ShellAPI', true);
    }

    /**
     * @author Jon taylor
     * @since 1.0
     * @define Converts json to an object.  If $file is true then it
     *          treats the $json parameter as a file path.
     * @param $json
     * @param bool $file
     * @return mixed
     */
    static protected function json2object($json, $file = false)
    {
            if($file)
                $json = file_get_contents($json);
            return json_decode($json);
    }

    /**
     * @author Jon taylor
     * @since 1.0
     * @define Finds the root directory of the project, not the ShellAPI class.
     * @return string
     */
    static protected function root()
    {
        $path = explode(DIRECTORY_SEPARATOR, __DIR__);
        array_pop($path);
        array_pop($path);
        array_pop($path);
        return implode(DIRECTORY_SEPARATOR, $path);
    }
}