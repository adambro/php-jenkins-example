<?php

class HelloTest extends Silex\WebTestCase
{
    public function createApplication()
    {
        return require __DIR__ . "/../src/app.php";
    }
    
    public function testHelloNameExample()
    {
        $client = $this->createClient();
        $client->request("GET", "/hello/test");
        
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertContains("test", $client->getResponse()->getContent());
    }
}