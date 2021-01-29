<?php


namespace App\Tests\Service;


use Symfony\Component\Config\Definition\Exception\Exception;
use App\Service\MathService;
use PHPUnit\Framework\TestCase;

class MathServiceTest extends TestCase
{
    /**
     * @var MathService
     */
    private $service;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->service = new MathService();
    }

    /**
     * @test
     */
    public function sqr1()
    {
        //$service = new MathService();
        self::assertEquals(1,$this->service->sqr(1));
    }
    /**
     * @test
     */
    public function sqr3()
    {
        //$service = new MathService();
        self::assertEquals(9,$this->service->sqr(3));
    }
    /**
     * @test
     */
    public function sqr_1()
    {
        //$service = new MathService();
        self::assertEquals(1,$this->service->sqr(-1));
    }

    /**
     * @test
     */
    public function sqrt1()
    {
        //$service = new MathService();
        self::assertEquals(1,$this->service->sqrt(1));
    }
    /**
     * @test
     */
    public function sqrt4()
    {
        //$service = new MathService();
        self::assertEquals(2,$this->service->sqrt(4));
    }
    /**
     * @test
     */
    public function sqrt_1()
    {
        //$service = new MathService();
        $this->expectException(Exception::class);
        $this->service->sqrt(-1);
    }

    /**
     * @test
     */
    public function del1()
    {
        //$service = new MathService();
        self::assertEquals(1,$this->service->del(1));
    }
    /**
     * @test
     */
    public function del_1()
    {
        //$service = new MathService();
        self::assertEquals(-1,$this->service->del(-1));
    }
    /**
     * @test
     */
    public function del2()
    {
        //$service = new MathService();
        self::assertEquals(0.5,$this->service->del(2));
    }
    /**
     * @test
     */
    public function del0()
    {
        //$service = new MathService();
        $this->expectException(Exception::class);
        $this->service->del(0);
    }

    /**
     * @test
     */
    public function neg1()
    {
        //$service = new MathService();
        self::assertEquals(-1,$this->service->neg(1));
    }
    /**
     * @test
     */
    public function neg_1()
    {
        //$service = new MathService();
        self::assertEquals(1,$this->service->neg(-1));
    }
    /**
     * @test
     */
    public function neg0()
    {
        //$service = new MathService();
        self::assertEquals(-0,$this->service->neg(0));
    }
}