<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
	/**
	 * testet die GET-Methode mit Parameter
	 */
    public function testProductGet()
    {
		$this->json('get', '/api/products/1')->assertStatus(200);
	}
	
	/**
	 * testet die GET-Methode ohne Parameter
	 */
	public function testProductGetAll()
	{
		$this->json('get', '/api/products')->assertStatus(200);
	}
	
	/**
	 * testet die POST-Methode
	 */
	public function testProductCreate()
	{
		$this->markTestSkipped('Der Test muss gemockt werden.');
		
		$product = [
            'name' => 'Flugzeut',
        ];
        
		$this->json('post', '/api/products', $product)->assertStatus(201);	
	}
	
	/**
	 * testet die PUT-Methode
	 */
	public function testProductUpdate()
	{
		$this->markTestSkipped('Der Test muss gemockt werden.');
		
		$product = [
            'name' => 'Tisch',
        ];
        
		$this->json('put', '/api/products/4', $product)->assertStatus(200);	
	}
	
	/**
	 * testet die DELETE-Methode
	 */
	public function testProductDelete()
	{
		#$this->markTestSkipped('Der Test muss gemockt werden.');
		
		$product = [
            'name' => 'Fernseher',
        ];
        
		$this->json('delete', '/api/products/8', $product)->assertStatus(204);	
	}
}
