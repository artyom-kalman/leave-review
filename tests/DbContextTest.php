<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

use RatePage\Models\User;
use RatePage\Models\Review;

use RatePage\Data\DbContext;

require "Data/DbConnection.php";
require "Data/DbContext.php";

require "Models/User.php";
require "Models/Review.php";

final class DbContextTest extends TestCase {
    private static $dbContext;

    public static function setUpBeforeClass(): void {
        $connectionString = "host=localhost dbname=rate-page user=postgres password=12345";
        $dbConnection = connectToDb($connectionString);

        if (!$dbConnection) {
            throw new \Exception("Failde to connect to database.");
            exit;
        }

        self::$dbContext = new DbContext($dbConnection);
        self::$dbContext->DeleteAllReviews();
    }

    public static function usersProvider(): array {
        return [
            ['admin', true],
            ['user1', true],
            ['user2', false],
        ];
    }

    #[DataProvider('usersProvider')]
    public function testUserExists(string $userId, bool $expectedResult): void {
        $user = new User;
        $user->id = $userId;

        $actualResult = self::$dbContext->UserExists($user);

        $this->assertSame($expectedResult, $actualResult);
    }

    #[DataProvider('usersProvider')]
    public function testAddReview(string $userId, bool $expectedResult): void {
        $review = new Review;
        $review->userId = $userId;
        $review->rating = 4;
        $review->comment = 'Comment';

        $actualResult = self::$dbContext->AddReview($review);

        $this->assertSame($expectedResult, $actualResult);
    }
}