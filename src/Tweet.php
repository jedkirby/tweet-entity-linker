<?php

namespace Jedkirby\TweetEntityLinker;

class Tweet
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var array
     */
    private $urls = [];

    /**
     * @var array
     */
    private $mentions = [];

    /**
     * @var array
     */
    private $hashtags = [];

    /**
     * @var array
     */
    private $cashtags = [];

    /**
     * @param string $text
     * @param array $urls
     * @param array $mentions
     * @param array $hashtags
     *
     * @return Tweet
     */
    public static function make($text, array $urls = [], array $mentions = [], array $hashtags = [], array $cashtags = [])
    {
        return new self($text, $urls, $mentions, $hashtags, $cashtags);
    }

    /**
     * @param string $text
     * @param array $urls
     * @param array $mentions
     * @param array $hashtags
     * @param array $cashtags
     */
    private function __construct($text, array $urls = [], array $mentions = [], array $hashtags = [], array $cashtags = [])
    {
        $this->text = $text;
        $this->urls = $urls;
        $this->mentions = $mentions;
        $this->hashtags = $hashtags;
        $this->cashtags = $cashtags;
    }

    /**
     * Convert the standard text into it's HTML entities.
     *
     * @return string
     */
    public function linkify()
    {
        $entities = [];

        foreach($this->cashtags as $cashtag) {
            $entities[] = new Entity\Cashtag($cashtag);
        }

        foreach ($this->hashtags as $hashtag) {
            $entities[] = new Entity\Hashtag($hashtag);
        }

        foreach ($this->mentions as $mention) {
            $entities[] = new Entity\UserMention($mention);
        }

        foreach ($this->urls as $url) {
            $entities[] = new Entity\Url($url);
        }

        $text = $this->text;
        foreach ($entities as $entity) {
            $text = preg_replace(
                $entity->getSearchPattern(),
                $entity->getHtml(),
                $text,
                1
            );
        }

        return $text;
    }
}
