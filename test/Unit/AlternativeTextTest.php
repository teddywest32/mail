<?php
declare(strict_types=1);

namespace Genkgo\TestMail;

use Genkgo\Mail\AlternativeText;

final class AlternativeTextTest extends AbstractTestCase
{
    /**
     * @test
     * @dataProvider provideHtmlFiles
     */
    public function it_converts_html_to_plain_text($htmlFile, $txtFile)
    {
        $html = file_get_contents(__DIR__ . '/../Stub/AlternativeTextTest/' . $htmlFile);
        $text = file_get_contents(__DIR__ . '/../Stub/AlternativeTextTest/' . $txtFile);

        $alternativeText = AlternativeText::fromHtml($html);
        $this->assertEquals($text, (string) $alternativeText);
    }

    /**
     * @return array
     */
    public function provideHtmlFiles()
    {
        return [
            ['simple.html', 'simple.txt'],
            ['error.html', 'error.txt'],
        ];
    }

}