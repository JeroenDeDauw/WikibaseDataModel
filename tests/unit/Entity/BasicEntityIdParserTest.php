<?php

namespace Wikibase\DataModel\Tests\Entity;

use Wikibase\DataModel\Entity\BasicEntityIdParser;
use Wikibase\DataModel\Entity\EntityId;
use Wikibase\DataModel\Entity\ItemId;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @covers Wikibase\DataModel\Entity\BasicEntityIdParser
 * @covers Wikibase\DataModel\Entity\DispatchingEntityIdParser
 *
 * @group Wikibase
 * @group WikibaseDataModel
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class BasicEntityIdParserTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider idProvider
	 */
	public function testCanParseEntityId( EntityId $expected ) {
		$parser = new BasicEntityIdParser();

		$actual = $parser->parse( $expected->getSerialization() );

		$this->assertEquals( $actual, $expected );
	}

	public function idProvider() {
		return array(
			array( new ItemId( 'q42' ) ),
			array( new ItemId( 'Q1337' ) ),
			array( new PropertyId( 'p1' ) ),
			array( new PropertyId( 'P100000' ) ),
		);
	}

}
