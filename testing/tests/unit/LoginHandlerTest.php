<?php


use PHPUnit\Framework\TestCase;

include '../backend/FunctionTesting.php';


class LoginHandlerTest extends TestCase{

  public function testIfUserLoggedIn() {
        $this->assertTrue(LoginMe("root", "devbridge321"));
    }

}
