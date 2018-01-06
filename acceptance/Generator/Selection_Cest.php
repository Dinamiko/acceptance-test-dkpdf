<?php

class Selection_Cest {

	public function _before( AcceptanceTester $I ) {

		$I->amOnPage('/wp-login.php');
		$I->wait(1);
		$I->fillField(['name' => 'log'], 'admin');
		$I->fillField(['name' => 'pwd'], 'password');
		$I->click('#wp-submit');
	}

	public function _after( AcceptanceTester $I ) {}

	/**
	 * Test select Posts.
	 */
	public function select_posts( AcceptanceTester $I ) {

		$I->amOnPage('/wp-admin/admin.php?page=dkpdf-gtool');
		$I->see('Select posts, pages and custom post types', 'h3');
	}

	/**
	 * Test select Categories.
	 */
	public function select_categories( AcceptanceTester $I ) {

		$I->amOnPage('/wp-admin/admin.php?page=dkpdf-gtool');
		$I->see('Select posts categories and taxonomy terms', 'h3');
	}

}
