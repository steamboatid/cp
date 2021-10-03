<?php

/**
 * @group pomo
 */
class Tests_POMO_Translations extends WP_UnitTestCase {

	function test_add_entry() {
		$entry = new Translation_Entry(array('singular' => 'baba',));
		$entry2 = new Translation_Entry(array('singular' => 'dyado',));
		$empty = new Translation_Entry();
		$po = new Translations();
<<<<<<< HEAD
		$po->add_entry($entry);
		$this->assertEquals(array($entry->key() => $entry), $po->entries);
		// add the same entry more than once
		// we do not need to test proper key generation here, see test_key()
		$po->add_entry($entry);
		$po->add_entry($entry);
		$this->assertEquals(array($entry->key() => $entry), $po->entries);
		$po->add_entry($entry2);
		$this->assertEquals(array($entry->key() => $entry, $entry2->key() => $entry2), $po->entries);
		// add empty entry
		$this->assertEquals(false, $po->add_entry($empty));
		$this->assertEquals(array($entry->key() => $entry, $entry2->key() => $entry2), $po->entries);
=======
		$po->add_entry( $entry );
		$this->assertSame( array( $entry->key() => $entry ), $po->entries );
		// Add the same entry more than once.
		// We do not need to test proper key generation here, see test_key().
		$po->add_entry( $entry );
		$po->add_entry( $entry );
		$this->assertSame( array( $entry->key() => $entry ), $po->entries );
		$po->add_entry( $entry2 );
		$this->assertSame(
			array(
				$entry->key()  => $entry,
				$entry2->key() => $entry2,
			),
			$po->entries
		);
		// Add empty entry.
		$this->assertFalse( $po->add_entry( $empty ) );
		$this->assertSame(
			array(
				$entry->key()  => $entry,
				$entry2->key() => $entry2,
			),
			$po->entries
		);
>>>>>>> 164b22cf6a (Tests: First pass at using `assertSame()` instead of `assertEquals()` in most of the unit tests.)

		// give add_entry() the arguments and let it create the entry itself
		$po = new Translations();
<<<<<<< HEAD
		$po->add_entry(array('singular' => 'baba',));
		$entries= array_values($po->entries);
		$this->assertEquals($entry->key(), $entries[0]->key());
=======
		$po->add_entry( array( 'singular' => 'baba' ) );
		$entries = array_values( $po->entries );
		$this->assertSame( $entry->key(), $entries[0]->key() );
>>>>>>> 164b22cf6a (Tests: First pass at using `assertSame()` instead of `assertEquals()` in most of the unit tests.)
	}

	function test_translate() {
		$entry1 = new Translation_Entry(array('singular' => 'baba', 'translations' => array('babax')));
		$entry2 = new Translation_Entry(array('singular' => 'baba', 'translations' => array('babay'), 'context' => 'x'));
		$domain = new Translations();
<<<<<<< HEAD
		$domain->add_entry($entry1);
		$domain->add_entry($entry2);
		$this->assertEquals('babax', $domain->translate('baba'));
		$this->assertEquals('babay', $domain->translate('baba', 'x'));
		$this->assertEquals('baba', $domain->translate('baba', 'y'));
		$this->assertEquals('babaz', $domain->translate('babaz'));
=======
		$domain->add_entry( $entry1 );
		$domain->add_entry( $entry2 );
		$this->assertSame( 'babax', $domain->translate( 'baba' ) );
		$this->assertSame( 'babay', $domain->translate( 'baba', 'x' ) );
		$this->assertSame( 'baba', $domain->translate( 'baba', 'y' ) );
		$this->assertSame( 'babaz', $domain->translate( 'babaz' ) );
>>>>>>> 164b22cf6a (Tests: First pass at using `assertSame()` instead of `assertEquals()` in most of the unit tests.)
	}

	function test_translate_plural() {
		$entry_incomplete = new Translation_Entry(array('singular' => 'baba', 'plural' => 'babas', 'translations' => array('babax')));
		$entry_toomany = new Translation_Entry(array('singular' => 'wink', 'plural' => 'winks', 'translations' => array('winki', 'winka', 'winko')));
		$entry_2 = new Translation_Entry(array('singular' => 'dyado', 'plural' => 'dyados', 'translations' => array('dyadox', 'dyadoy')));
		$domain = new Translations();
<<<<<<< HEAD
		$domain->add_entry($entry_incomplete);
		$domain->add_entry($entry_toomany);
		$domain->add_entry($entry_2);
		$this->assertEquals('other', $domain->translate_plural('other', 'others', 1));
		$this->assertEquals('others', $domain->translate_plural('other', 'others', 111));
		// too few translations + cont logic
		$this->assertEquals('babas', $domain->translate_plural('baba', 'babas', 2));
		$this->assertEquals('babas', $domain->translate_plural('baba', 'babas', 0));
		$this->assertEquals('babas', $domain->translate_plural('baba', 'babas', -1));
		$this->assertEquals('babas', $domain->translate_plural('baba', 'babas', 999));
		// proper
		$this->assertEquals('dyadox', $domain->translate_plural('dyado', 'dyados', 1));
		$this->assertEquals('dyadoy', $domain->translate_plural('dyado', 'dyados', 0));
		$this->assertEquals('dyadoy', $domain->translate_plural('dyado', 'dyados', 18881));
		$this->assertEquals('dyadoy', $domain->translate_plural('dyado', 'dyados', -18881));
=======
		$domain->add_entry( $entry_incomplete );
		$domain->add_entry( $entry_toomany );
		$domain->add_entry( $entry_2 );
		$this->assertSame( 'other', $domain->translate_plural( 'other', 'others', 1 ) );
		$this->assertSame( 'others', $domain->translate_plural( 'other', 'others', 111 ) );
		// Too few translations + cont logic.
		$this->assertSame( 'babas', $domain->translate_plural( 'baba', 'babas', 2 ) );
		$this->assertSame( 'babas', $domain->translate_plural( 'baba', 'babas', 0 ) );
		$this->assertSame( 'babas', $domain->translate_plural( 'baba', 'babas', -1 ) );
		$this->assertSame( 'babas', $domain->translate_plural( 'baba', 'babas', 999 ) );
		// Proper.
		$this->assertSame( 'dyadox', $domain->translate_plural( 'dyado', 'dyados', 1 ) );
		$this->assertSame( 'dyadoy', $domain->translate_plural( 'dyado', 'dyados', 0 ) );
		$this->assertSame( 'dyadoy', $domain->translate_plural( 'dyado', 'dyados', 18881 ) );
		$this->assertSame( 'dyadoy', $domain->translate_plural( 'dyado', 'dyados', -18881 ) );
>>>>>>> 164b22cf6a (Tests: First pass at using `assertSame()` instead of `assertEquals()` in most of the unit tests.)
	}

	function test_digit_and_merge() {
		$entry_digit_1 = new Translation_Entry(array('singular' => 1, 'translations' => array('1')));
		$entry_digit_2 = new Translation_Entry(array('singular' => 2, 'translations' => array('2')));
		$domain = new Translations();
		$domain->add_entry($entry_digit_1);
		$domain->add_entry($entry_digit_2);
		$dummy_translation = new Translations;
		$this->assertSame( '1', $domain->translate( '1' ) );
		$domain->merge_with( $dummy_translation );
		$this->assertSame( '1', $domain->translate( '1' ) );
	}

}
