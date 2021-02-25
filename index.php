<?php

require_once __DIR__ . '/Logger/Logger.php';
require_once __DIR__ . '/Logger/SyslogLogger.php';
require_once __DIR__ . '/Logger/FileLogger.php';
require_once __DIR__ . '/Logger/FakeLogger.php';
require_once __DIR__ . '/Logger/LogLevel.php';

$logger = new Logger\Logger();

/**
 * Логер который все логи будет писать в файл application.log
 */
$fileLogger = new Logger\FileLogger(
    [
        'is_enabled' => true,
        'filename' => __DIR__ . '/application.log',
    ]
);

$logger->addLogger($fileLogger);

/**
 * Логер который все ошибки будет писать в файл application.error.log
 */
$logger->addLogger(
    new Logger\FileLogger(
        [
            'is_enabled' => true,
            'filename' => __DIR__ . '/application.error.log',
            'levels' => [
                Logger\LogLevel::LEVEL_ERROR,
            ],
        ]
    )
);

/**
 * Логгер который все информационные логи будет писать в файл application.info.log
 */
$logger->addLogger(
    new Logger\FileLogger(
        [
            'is_enabled' => true,
            'filename' => __DIR__ . '/application.info.log',
            'levels' => [
                Logger\LogLevel::LEVEL_INFO,
            ],
        ]
    )
);

/**
 * Логгер который все debug логи записывает в syslog
 *
 * @see http://php.net/manual/ru/function.syslog.php
 */
$logger->addLogger(
    new Logger\SyslogLogger(
        [
            'is_enabled' => true,
            'levels' => [
                Logger\LogLevel::LEVEL_DEBUG,
            ],
        ]
    )
);

/**
 * Логгер который ничего не делает
 */
$logger->addLogger(
    new Logger\FakeLogger()
);


$logger->log(Logger\LogLevel::LEVEL_ERROR, 'Error message');
//$logger->error('Error message');
