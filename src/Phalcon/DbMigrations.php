<?php

namespace Phalcon;

/**
 * Class Migrations
 */
class DbMigrations
{
    /**
     * @var string
     */
    protected $migrationsPath;

    public function __construct()
    {
        $this->migrationsPath = realpath(__DIR__ . '/../../') . '/app/migrations/';
    }

    public function generate()
    {
        $version = date('Ymd') . time();
        $content = file_get_contents(__DIR__ . '/DbMigrations/Resources/version.dist');
        $content = str_replace('[VERSION]', $version, $content);

        file_put_contents($this->migrationsPath . '/Version' . $version  . '.php', $content);

        echo 'Version ' . $version . ' generated!' . PHP_EOL;
    }

    public function migrate()
    {
        $files = [];

        $iterator = new \DirectoryIterator($this->migrationsPath);

        foreach ($iterator as $fileInfo) {
            if ($fileInfo->isFile()) {
                $files[$fileInfo->getMTime()] = $fileInfo->getFilename();
            }
        }

        var_dump($files);
    }

    public function rollback()
    {

    }
}
