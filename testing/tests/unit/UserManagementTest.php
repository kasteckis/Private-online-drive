<?php


use PHPUnit\Framework\TestCase;

include '../backend/UserManagement.php';

class UserManagementTest extends TestCase{

  public function testIfDirectoryIsDeleted() {
        // $this->expectOutputString("Your account is suspended by administrator!");
        // LoginMe("test123", "test123");
        // $this->assertEquals(LoginMe("test123", "test123"), "Your account is suspended by administrator!");
        $this->assertTrue(delete_directory("TestUser"));
    }

    

}
