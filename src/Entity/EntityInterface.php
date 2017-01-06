<?php

namespace Jedkirby\TweetEntityLinker\Entity;

interface EntityInterface
{

    /**
     * Return the text to search for.
     *
     * @return string
     */
    public function getSearchText();

    /**
     * Return the text to replace.
     *
     * @return string
     */
    public function getHtml();

}
