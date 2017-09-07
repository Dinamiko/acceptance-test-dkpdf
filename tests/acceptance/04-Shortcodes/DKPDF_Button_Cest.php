<?php

class Post_MetaBox_Cest {

	public function _before( AcceptanceTester $I ) {

		$I->amOnPage('/wp-login.php');
		$I->wait(1);
		$I->fillField(['name' => 'log'], 'admin');
		$I->fillField(['name' => 'pwd'], 'password');
		$I->click('#wp-submit');
	}

	public function _after( AcceptanceTester $I ) {}

	/**
	 * Test [dkpdf-button]
	 */
	public function dkpdf_button( AcceptanceTester $I ) {

		$I->amOnPage( '/wp-admin/admin.php?page=dkpdf_settings' );
		$I->see( 'PDF Button', 'h2' );

		$I->checkOption('#pdfbutton_post_types_post');
		$I->click('Save Settings');
		$I->see('Settings saved.');

		$I->amOnPage( '/wp-admin/post-new.php' );
		$I->fillField('#title', 'DKPDF Button Shortcode');
		$I->executeJS('jQuery("#content").show()');
		$I->wait(1);
		$I->fillField('#content', '[dkpdf-button]');

		$I->executeJS('window.scrollTo(0,0);');
		$I->click('#publish');

		$I->amOnPage( '/' );
		$I->dontSeeElement('.dkpdf-button-container');
		$I->see('DKPDF Button Shortcode');
		$I->click('DKPDF Button Shortcode');

		$I->seeElement('.dkpdf-button-container');
	}

}
