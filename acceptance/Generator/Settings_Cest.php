<?php

class Settings_Cest {

	public function _before( AcceptanceTester $I ) {

		$I->amOnPage('/wp-login.php');
		$I->wait(1);
		$I->fillField(['name' => 'log'], 'admin');
		$I->fillField(['name' => 'pwd'], 'password');
		$I->click('#wp-submit');
	}

	public function _after( AcceptanceTester $I ) {}

	/**
	 * Test Cover setting.
	 */
	public function cover_setting( AcceptanceTester $I ) {

		$I->amOnPage('/wp-admin/admin.php?page=dkpdf-gtool&tab=dkpdfg_cover');
		$I->see('Cover', 'h2');

		$I->seeCheckboxIsChecked('#show_cover');
		$I->seeInField('#cover_title','');
		$I->seeInField('#cover_description','');
		$I->seeOptionIsSelected('#cover_text_align', 'left');
		$I->seeInField('#cover_text_margin_top','100');
		$I->seeInField('input[name=dkpdfg_cover_text_color]','#000');
		$I->seeInField('input[name=dkpdfg_cover_bg_color]','#FFF');

		$I->uncheckOption('#show_cover');
		$I->fillField('#cover_title', 'Some Title');
		$I->fillField('#cover_description', 'Some Description');
		$I->selectOption('#cover_text_align', 'right');
		$I->fillField('#cover_text_margin_top', '0');
		$I->fillField('input[name=dkpdfg_cover_text_color]', '#FFF');
		$I->fillField('input[name=dkpdfg_cover_bg_color]', '#000');
		$I->click('Save Settings');

		$I->dontSeeCheckboxIsChecked('#show_cover');
		$I->seeInField('#cover_title','Some Title');
		$I->seeInField('#cover_description','Some Description');
		$I->seeOptionIsSelected('#cover_text_align', 'right');
		$I->seeInField('#cover_text_margin_top','0');
		$I->seeInField('input[name=dkpdfg_cover_text_color]','#FFF');
		$I->seeInField('input[name=dkpdfg_cover_bg_color]','#000');
	}

	/**
	 * Test Table of Contents setting.
	 */
	public function toc_setting( AcceptanceTester $I ) {

		$I->amOnPage('/wp-admin/admin.php?page=dkpdf-gtool&tab=dkpdfg_toc');
		$I->see('Table of contents', 'h2');

		$I->seeCheckboxIsChecked('#show_toc');
		$I->seeInField('#toc_title','Table of contents');

		$I->uncheckOption('#show_toc');
		$I->fillField('#toc_title', 'Some Title');
		$I->click('Save Settings');

		$I->dontSeeCheckboxIsChecked('#show_toc');
		$I->seeInField('#toc_title','Some Title');
	}

}
