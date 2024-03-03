<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

require "src/validation.php";

final class ValidationTest extends TestCase {
    public static function textProvider(): array {
        return [
            [' Спасибо! Всё понравилось! ', 'Спасибо! Всё понравилось!'],
            ['bisovsno@^', false],
            ['t', false],
        ];
    }

    #[DataProvider('textProvider')]
    public function testTextInputValidation(string $input, $expectedResult): void {
        $actualResult = validateTextInput($input);

        $this->assertSame($expectedResult, $actualResult);
    }
}