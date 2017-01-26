<?php

namespace Jedkirby\TweetEntityLinker\Tests;

use Symfony\Component\Yaml\Yaml;
use Jedkirby\TweetEntityLinker\Tweet;
use PHPUnit_Framework_TestCase as TestCase;

class ConformanceTest extends TestCase
{

    /**
     * @return array
     */
    private function getConformanceTests()
    {
        return Yaml::parse(
            file_get_contents(
                realpath(__DIR__ . '/../vendor/twitter/twitter-text/conformance/autolink.yml')
            )
        );
    }

    /**
     * @test
     */
    public function itConformsToUsernameTests()
    {
        $tests = $this->getConformanceTests()['tests']['usernames'];
        $mentions = [
            [
                'screen_name' => 'username'
            ]
        ];

        foreach ($tests as $test) {
            $tweet = Tweet::make($test['text'], [], $mentions, []);
            $this->assertEquals(
                $test['expected'],
                $tweet->linkify(),
                sprintf('Failed on conformance "%s"', $test['description'])
            );
        }
    }

}
