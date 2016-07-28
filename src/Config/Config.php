<?php

namespace NicklasW\PkmGoApi\Config;

use Illuminate\Config\Repository;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use NicklasW\PkmGoApi\Kernels\Kernel;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class Config extends Repository {

    /**
     * @param Kernel $app
     */
    public function bootstrap($app)
    {
        // Load the configuration files
        $this->loadConfigurationFiles($app);
    }

    /**
     * Load the configuration items from all of the files.
     *
     * @param ApplicationKernel $app
     * @return void
     */
    protected function loadConfigurationFiles($app)
    {
        foreach ($this->getConfigurationFiles($app) as $key => $path) {
            $this->set($key, require $path);
        }
    }

    /**
     * Get all of the configuration files for the application.
     *
     * @param ApplicationKernel $app
     * @return array
     */
    protected function getConfigurationFiles($app)
    {
        $files = [];

        $configPath = realpath($app->configPath());

        foreach (Finder::create()->files()->name('*.php')->in($configPath) as $file) {
            $nesting = $this->getConfigurationNesting($file, $configPath);

            $files[$nesting . basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }

        return $files;
    }

    /**
     * Get the configuration file nesting path.
     *
     * @param  SplFileInfo $file
     * @param  string      $configPath
     * @return string
     */
    protected function getConfigurationNesting(SplFileInfo $file, $configPath)
    {
        $directory = dirname($file->getRealPath());

        if ($tree = trim(str_replace($configPath, '', $directory), DIRECTORY_SEPARATOR)) {
            $tree = str_replace(DIRECTORY_SEPARATOR, '.', $tree) . '.';
        }

        return $tree;
    }

}