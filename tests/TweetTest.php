<?php

namespace Tests\Jedkirby\TweetEntityLinker;

use Jedkirby\TweetEntityLinker\Tweet;
use PHPUnit_Framework_TestCase as TestCase;

class TweetTest extends TestCase
{

    /**
     * @param string $endpoint
     * @param boolean $assoc
     *
     * @return stdClass|array
     */
    protected function getSampleApiResponse($endpoint, $assoc = false)
    {
        return json_decode(
            file_get_contents(
                sprintf(
                    __DIR__ . '/Fixtures/%s.json',
                    $endpoint
                )
            ),
            $assoc
        );
    }

    /**
     * Create a new Tweet object from a sample API response.
     *
     * @param string $endpoint
     * @param boolean $assoc
     *
     * @return Tweet
     */
    protected function getSampleTweet($endpoint, $assoc = false)
    {

        $response = $this->getSampleApiResponse($endpoint, $assoc);

        return Tweet::make(
            $response->text,
            $response->entities->urls,
            $response->entities->user_mentions,
            $response->entities->hashtags
        );

    }

    /**
     * @test
     */
    public function itParsesHashtagsCorrectly()
    {
        $this->assertEquals(
            $this->getSampleTweet('hashtag-entity')->linkify(),
            'This tweet has a specific #<a href="https://twitter.com/hashtag/Hashtag" target="_blank">Hashtag</a> within it, and #<a href="https://twitter.com/hashtag/Another" target="_blank">Another</a> one.'
        );
    }

    /**
     * @test
     */
    public function itParsesUrlsCorrectly()
    {
        $this->assertEquals(
            $this->getSampleTweet('url-entity')->linkify(),
            'Click this <a href="https://t.co/qeSnkprYiP" target="_blank">jedkirby.com</a> to go to my portfolio, or <a href="https://t.co/Ed4omjYs" target="_blank">google.co.uk</a> to go elsewhere.'
        );
    }

    /**
     * @test
     */
    public function itParsesUserMentionsCorrectly()
    {
        $this->assertEquals(
            $this->getSampleTweet('user-mention-entity')->linkify(),
            'This tweet is for @<a href="https://twitter.com/jedkirby" target="_blank">jedkirby</a>, and it also targets @<a href="https://twitter.com/google" target="_blank">google</a> too.'
        );
    }

    /**
     * @return string
     */
    protected function getAllEntitiesCorrectString()
    {
        return 'This tweet has it all, it has got the links <a href="https://t.co/qeSnkprYiP" target="_blank">jedkirby.com</a> and <a href="https://t.co/Ed4omjYs" target="_blank">google.co.uk</a>, it has the hashtags #<a href="https://twitter.com/hashtag/Hashtag" target="_blank">Hashtag</a> and #<a href="https://twitter.com/hashtag/Another" target="_blank">Another</a>, and finally the user mentions for @<a href="https://twitter.com/jedkirby" target="_blank">jedkirby</a> and @<a href="https://twitter.com/google" target="_blank">google</a>.';
    }

    /**
     * @test
     */
    public function itParsesAllEntitiesCorrectly()
    {
        $this->assertEquals(
            $this->getSampleTweet('all-entities')->linkify(),
            $this->getAllEntitiesCorrectString()
        );
    }

    /**
     * @test
     */
    public function itHandlesObjectEntities()
    {
        $this->assertEquals(
            $this->getSampleTweet('all-entities', false)->linkify(),
            $this->getAllEntitiesCorrectString()
        );
    }

    /**
     * @test
     */
    public function itHandlesArrayEntities()
    {

        $response = $this->getSampleApiResponse('all-entities', true);
        $tweet = Tweet::make(
            $response['text'],
            $response['entities']['urls'],
            $response['entities']['user_mentions'],
            $response['entities']['hashtags']
        );

        $this->assertEquals(
            $tweet->linkify(),
            $this->getAllEntitiesCorrectString()
        );

    }

}
