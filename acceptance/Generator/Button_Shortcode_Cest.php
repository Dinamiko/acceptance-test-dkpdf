<?php

class Button_Shortcode_Cest {

	public function _before( AcceptanceTester $I ) {

		$I->amOnPage('/wp-login.php');
		$I->wait(1);
		$I->fillField(['name' => 'log'], 'admin');
		$I->fillField(['name' => 'pwd'], 'password');
		$I->click('#wp-submit');
	}

	/**
	 * [dkpdfg-button] Default settings.
	 */
	public function dkpdfg_button_default_settings( AcceptanceTester $I ) {

		$I->amOnPage('/wp-admin/admin.php?page=dkpdf-gtool&tab=dkpdfg_button');

		// see default settings values
		$I->seeElement('#pdfgbutton_text');
		$I->seeInField('#pdfgbutton_text','PDF Button');
		$I->seeCheckboxIsChecked('#pdfgbutton_align_right');
	}

	/**
	 * [dkpdfg-button] Update settings.
	 */
	public function dkpdfg_button_update_settings( AcceptanceTester $I ) {

		$I->amOnPage('/wp-admin/admin.php?page=dkpdf-gtool&tab=dkpdfg_button');

		// change settings values
		$I->fillField('#pdfgbutton_text', 'PDF Generator Button');
		$I->checkOption('#pdfgbutton_align_left');
		$I->click('Save Settings');

		// see saved values
		$I->seeElement('#pdfgbutton_text');
		$I->seeInField('#pdfgbutton_text','PDF Generator Button');
		$I->seeCheckboxIsChecked('#pdfgbutton_align_left');
	}

	/**
	 * Add shortcode to post
	 */
	public function add_shortcode_to_post( AcceptanceTester $I  ) {

		// create a post
		$I->amOnPage( '/wp-admin/post-new.php' );
		$I->fillField( '#title', 'DKPDF Generator Button Shortcode' );
		$I->click('#content-html');
		$I->fillField( '#content', '[dkpdfg-button]' );
		$I->wait(1);
		$I->executeJS( 'window.scrollTo(0,0);' );
		$I->click( '#publish' );

		// check pdf button in frontend
		$I->amOnPage( '/' );
		$I->see( 'DKPDF Generator Button Shortcode' );
		$I->click( 'DKPDF Generator Button Shortcode' );
		$I->seeElement( '#dkpdfg-button' );
	}
}
