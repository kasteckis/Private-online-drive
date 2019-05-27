<?php


use PHPUnit\Framework\TestCase;

include '../backend/PasswordReset/ResetPassword.php';

class FileUploadTest extends TestCase{

  public function testIfFileDeleted() {
         $this->expectOutputString("File  was deleted!<br>");
         ResetPassword("tidish@inbox.lt");
        // LoginMe("test123", "test123");
        // $this->assertEquals(LoginMe("test123", "test123"), "Your account is suspended by administrator!");
        // $this->assertTrue(Logout());
    }



}
