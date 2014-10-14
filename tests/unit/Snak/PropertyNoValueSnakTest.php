<?php

namespace Wikibase\Test\Snak;

use Wikibase\DataModel\Entity\PropertyId;

/**
 * @covers Wikibase\DataModel\Snak\PropertyNoValueSnak
 *
 * @group Wikibase
 * @group WikibaseDataModel
 * @group WikibaseSnak
 *
 * @group Database
 *
 * @licence GNU GPL v2+
 * @author Thiemo Mättig
 */
class PropertyNoValueSnakTest extends SnakObjectTest {

	public function constructorProvider() {
		return array(
			array( true, new PropertyId( 'P1' ) ),
			array( true, new PropertyId( 'P9001' ) ),
		);
	}

	public function getClass() {
		return 'Wikibase\DataModel\Snak\PropertyNoValueSnak';
	}

}
