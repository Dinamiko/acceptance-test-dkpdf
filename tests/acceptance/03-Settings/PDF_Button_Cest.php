<?php

class PDF_Button_CestCest {

    public function _before( AcceptanceTester $I ) {

	    $I->amOnPage('/wp-login.php');
	    $I->wait(1);
	    $I->fillField(['name' => 'log'], 'admin');
	    $I->fillField(['name' => 'pwd'], 'password');
	    $I->click('#wp-submit');
    }

    public function _after( AcceptanceTester $I ) {}

	/**
	 * Test default setting values
	 */
    public function default_setting_values( AcceptanceTester $I ) {

	    $I->amOnPage('/wp-admin/admin.php?page=dkpdf_settings');
	    $I->see('PDF Button', 'h2');

	    $I->seeInField('#pdfbutton_text','PDF Button');

	    $I->dontSeeCheckboxIsChecked('#pdfbutton_post_types_post');
	    $I->dontSeeCheckboxIsChecked('#pdfbutton_post_types_page');
	    $I->dontSeeCheckboxIsChecked('#pdfbutton_post_types_attachment');

	    $I->seeCheckboxIsChecked('#pdfbutton_action_open');
	    $I->dontSeeCheckboxIsChecked('#pdfbutton_action_download');

	    $I->dontSeeCheckboxIsChecked('#pdfbutton_position_shortcode');
	    $I->seeCheckboxIsChecked('#pdfbutton_position_before');
	    $I->dontSeeCheckboxIsChecked('#pdfbutton_position_after');

	    $I->dontSeeCheckboxIsChecked('#pdfbutton_align_left');
	    $I->dontSeeCheckboxIsChecked('#pdfbutton_align_center');
	    $I->seeCheckboxIsChecked('#pdfbutton_align_right');
    }

	/**
	 * Test change setting values
	 */
	public function change_setting_values( AcceptanceTester $I ) {

		$I->amOnPage('/wp-admin/admin.php?page=dkpdf_settings');
		$I->see('PDF Button', 'h2');

		$I->fillField(['name' => 'dkpdf_pdfbutton_text'], 'Another Button Title');
		$I->checkOption('#pdfbutton_post_types_post');
		$I->checkOption('#pdfbutton_post_types_page');
		$I->checkOption('#pdfbutton_post_types_attachment');
		$I->checkOption('#pdfbutton_action_download');
		$I->checkOption('#pdfbutton_position_shortcode');
		$I->checkOption('#pdfbutton_align_left');

		$I->click('Save Settings');
		$I->see('Settings saved.');

		$I->seeInField('#pdfbutton_text','Another Button Title');
		$I->seeCheckboxIsChecked('#pdfbutton_post_types_post');
		$I->seeCheckboxIsChecked('#pdfbutton_post_types_page');
		$I->seeCheckboxIsChecked('#pdfbutton_post_types_attachment');
		$I->dontSeeCheckboxIsChecked('#pdfbutton_action_open');
		$I->seeCheckboxIsChecked('#pdfbutton_action_download');
		$I->seeCheckboxIsChecked('#pdfbutton_position_shortcode');
		$I->dontSeeCheckboxIsChecked('#pdfbutton_position_before');
		$I->dontSeeCheckboxIsChecked('#pdfbutton_position_after');
		$I->seeCheckboxIsChecked('#pdfbutton_align_left');
		$I->dontSeeCheckboxIsChecked('#pdfbutton_align_center');
		$I->dontSeeCheckboxIsChecked('#pdfbutton_align_right');
	}
}
