<?php declare(strict_types=1);

namespace Book;

use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\TestCase;
use Book\Models\BookManager;
use Book\Models\TypeManager;

include 'src/config/config.php';

final class BookTest extends TestCase
{
    #[Before]
    public function initTestEnvironment(): void
    {
        // cette méthode est exécutée avant chaque test
        $this->bm = new BookManager();
        $this->tm = new TypeManager();
    }

    public function testGetOneBook(): void
    {

        $this->assertEquals(
            '72',
            $this->bm->TestOneBookid(72)
        );
    }

    public function testGetOneID(): void
    {

        $this->assertEquals(
            '1',
            $this->tm->TestGetOneCategory(1)
        );
    }

    public function testBookManager(): void
    {
            $this->assertInstanceOf(
                BookManager::class,
                $this->bm
            );
    }

    public function testTypeManager(): void
    {
        $this->assertInstanceOf(
            TypeManager::class,
            $this->tm
        );
    }
}