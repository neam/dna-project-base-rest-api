<?php

class m140617_135018_add_admin_account extends EDbMigration
{
	public function safeUp()
	{
        $password = '$2a$12$dyixOdTUCj3lcHhP0w.owu2esQMRb2vkedMx4tb3inn6OMYHZLium';
        $salt = '$2a$12$dyixOdTUCj3lcHhP0w.oww';

        $this->execute("INSERT INTO `account` VALUES (1, 'admin', '{$password}', 'webmaster@example.com', 'd6aef338ea9d2ea49a0f62705ef51ecc', 1, 1, '2014-03-25 22:04:20', NULL, '{$salt}', 'bcrypt', 0, NULL, NULL);");
        $this->execute("INSERT INTO `profile` VALUES (1, 'Administrator', 'Admin', NULL, NULL, NULL, 0, NULL, NULL, 'sv', NULL, NULL, NULL, NULL);");
	}

	public function safeDown()
	{
        $this->delete('account', 'id = 1');
        $this->delete('profile', 'user_id = 1');
	}
}
