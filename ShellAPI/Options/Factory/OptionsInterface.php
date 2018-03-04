<?php
namespace ShellAPI\Options\Factory;

interface OptionsInterface
{
    /**
     * @author Jon taylor
     * @since 1.0
     * @define This method will allow retrieving stored options for
     *          easy streamline.
     * @param $request
     * @return mixed
     */
    static public function get($request);
}