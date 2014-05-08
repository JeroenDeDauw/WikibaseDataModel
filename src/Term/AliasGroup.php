<?php

namespace Wikibase\DataModel\Term;

use Comparable;
use Countable;
use InvalidArgumentException;

/**
 * Ordered set of aliases. Immutable value object.
 *
 * Duplicates and whitespace only values are removed. Values are trimmed.
 *
 * @since 0.7.3
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class AliasGroup implements Comparable, Countable {

	private $languageCode;
	private $aliases;

	/**
	 * @param string $languageCode
	 * @param string[] $aliases
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct( $languageCode, array $aliases ) {
		$this->setLanguageCode( $languageCode );
		$this->setAliases( $aliases );
	}

	private function setLanguageCode( $languageCode ) {
		if ( !is_string( $languageCode ) ) {
			throw new InvalidArgumentException( '$languageCode needs to be a string' );
		}

		$this->languageCode = $languageCode;
	}

	private function setAliases( array $aliases ) {
		foreach ( $aliases as $alias ) {
			if ( !is_string( $alias ) ) {
				throw new InvalidArgumentException( 'All elements in $aliases need to be strings' );
			}
		}

		$this->aliases = array_values(
			array_filter(
				array_unique(
					array_map(
						'trim',
						$aliases
					)
				),
				function( $string ) {
					return $string !== '';
				}
			)
		);
	}

	/**
	 * @return string
	 */
	public function getLanguageCode() {
		return $this->languageCode;
	}

	/**
	 * @return string[]
	 */
	public function getAliases() {
		return $this->aliases;
	}

	/**
	 * @return boolean
	 */
	public function isEmpty() {
		return empty( $this->aliases );
	}

	/**
	 * @see Comparable::equals
	 *
	 * @param mixed $target
	 *
	 * @return boolean
	 */
	public function equals( $target ) {
		return $target instanceof AliasGroup
			&& $this->languageCode === $target->languageCode
			&& $this->aliases == $target->aliases;
	}

	/**
	 * @see Countable::count
	 * @return int
	 */
	public function count() {
		return count( $this->aliases );
	}

}