<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link      http://phpdoc.org
 */

namespace Flyfinder\Specification;

/**
 * Class CompositeSpecification
 * Base class for specifications, allows for combining specifications
 *
 * @psalm-immutable
 */
abstract class CompositeSpecification implements SpecificationInterface
{
    /**
     * Returns a specification that satisfies the original specification
     * as well as the other specification
     */
    public function andSpecification(SpecificationInterface $other) : AndSpecification
    {
        return new AndSpecification($this, $other);
    }

    /**
     * Returns a specification that satisfies the original specification
     * or the other specification
     */
    public function orSpecification(SpecificationInterface $other) : OrSpecification
    {
        return new OrSpecification($this, $other);
    }

    /**
     * Returns a specification that is the inverse of the original specification
     * i.e. does not meet the original criteria
     */
    public function notSpecification() : NotSpecification
    {
        return new NotSpecification($this);
    }
}
