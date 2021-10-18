<?php

namespace App\Service;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;

class MarkdownHelper
{
    private $markdownParser;
    private $cache;
    private $isDebug;
    private $logger;

    public function __construct(MarkdownParserInterface $markdownParser, CacheInterface $cache, bool $isDebug, LoggerInterface $logger)
    {
        $this->markdownParser = $markdownParser;
        $this->cache = $cache;
        $this->isDebug = $isDebug;
        $this->logger = $logger;
//        dump($isDebug);
    }


    public function  parse(string $source): string
    {
        if (strpos($source, 'cat') !== false) {
            $this->logger->info('Meow!');
        }
        if ($this->isDebug) {
            return $this->markdownParser->transformMarkdown($source);
        }
        return $this->cache->get('markdown'.md5($source), function () use ($source){
            return $this->markdownParser->transformMarkdown($source);
        });
    }
}