<?php

namespace Edge\QA\Tool;

class PhpcsV3 extends Phpcs
{
    public static $SETTINGS = array(
        'optionSeparator' => '=',
        'xml' => ['checkstyle.xml'],
        'errorsXPath' => [
            # ignoreWarnings => xpath
            false => '//checkstyle/file/error',
            true => '//checkstyle/file/error[@severity="error"]',
        ],
        'composer' => 'squizlabs/php_codesniffer',
        'binary' => 'phpcs',
    );

    public function __invoke()
    {
        require_once COMPOSER_VENDOR_DIR . '/squizlabs/php_codesniffer/autoload.php';
        return $this->buildPhpcs(\PHP_CodeSniffer\Util\Standards::getInstalledStandards());
    }
}
