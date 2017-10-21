<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Cache;

class PersonTest extends TestCase
{
    public function testPersonGetAll()
    {
		$this->get('persons')->assertStatus(200);
	}
	
	public function testPersonGet()
    {
		$this->get('persons/1')->assertStatus(200);
	}
}
