<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Tests\TestCase;

class ServiceContainerTest extends TestCase {

	public function testCreateDependency() {
		$foo = $this->app->make(Foo::class);
		$foo2 = $this->app->make(Foo::class);

		self::assertEquals("Foo", $foo->foo());
		self::assertEquals("Foo", $foo2->foo());
		self::assertNotSame($foo, $foo2);
	}

	public function testBind() {
		// $person = $this->app->make(Person::class);
		// self::assertInstanceOf(Person::class, $person);
		$this->app->bind(Person::class, function ($app) {
			return new Person('revenue', 'rev');
		});

		$person1 = $this->app->make(Person::class);
		$person2 = $this->app->make(Person::class);

		self::assertEquals("revenue", $person1->firstName);
		self::assertEquals("rev", $person2->lastName);
		self::assertNotSame($person1, $person2);
	}

	public function testInstance() {
		// $person = $this->app->make(Person::class);
		// self::assertInstanceOf(Person::class, $person);
		$person = new Person('revenue', 'rev');
		$this->app->instance(Person::class, $person);

		$person1 = $this->app->make(Person::class);
		$person2 = $this->app->make(Person::class);
		$person3 = $this->app->make(Person::class);
		$person4 = $this->app->make(Person::class);

		self::assertEquals("revenue", $person1->firstName);
		self::assertEquals("rev", $person2->lastName);
		self::assertSame($person1, $person2);
	}

	public function testDependency() {
		$this->app->singleton(Foo::class, function ($app) {
			return new Foo();
		});

		$this->app->singleton(bar::class, function ($app) {
			$foo = $app->make(Foo::class);
			return new Bar($foo);
		});

		$foo = $this->app->make(Foo::class);
		$bar = $this->app->make(Bar::class);
		$bar1 = $this->app->make(Bar::class);

		self::assertSame($foo, $bar->foo);
		self::assertSame($bar, $bar1);
	}

	public function testInterfaceToClass() {

		// $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);
		$this->app->singleton(HelloService::class, function ($app) {
			return new HelloServiceIndonesia();
		});

		$helloService = $this->app->make(HelloService::class);

		self::assertEquals("Halo revenue", $helloService->hello("revenue"));
	}

	public function testDependencyInjection() {

		$this->app->singleton(Foo::class, function ($app) {
			return new Foo();
		});

		$this->app->singleton(bar::class, function ($app) {
			$foo = $this->app->make(Foo::class);
			return new Bar($foo);
		});

		$foo = $this->app->make(Foo::class);
		$bar = $this->app->make(Bar::class);
		$bar2 = $this->app->make(Bar::class);

		self::assertSame($foo, $bar->foo);
		self::assertSame($bar, $bar2);
	}

}
