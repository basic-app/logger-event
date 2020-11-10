<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\LoggerEvent;

use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;
use Psr\Log\LoggerInterface;

abstract class BaseLoggerEvent extends \BasicApp\Event\BaseEvent
{
    
    use LoggerAwareTrait {setLogger as setLoggerTrait;}

    public function __construct(LoggerInterface $logger)
    {
        if (!$logger)
        {
            $logger = new NullLogger;
        }

        $this->setLogger($logger);
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->setLoggerTrait($logger);

        return $this;
    }

}