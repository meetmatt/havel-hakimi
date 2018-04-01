<?php

namespace MeetMatt\HavelHakimi;

use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;
use function array_shift;
use function usort;

final class Sequence implements IteratorAggregate
{
    /**
     * @var Vertex[]
     */
    private $vertices;

    /**
     * @param Vertex[] $vertices
     */
    public function __construct(array $vertices)
    {
        $this->vertices = $vertices;
    }

    /**
     * @param int[] $degrees
     *
     * @throws InvalidArgumentException
     *
     * @return Sequence
     */
    public static function fromDegrees(array $degrees): self
    {
        $vertices = [];
        foreach ($degrees as $degree) {
            $vertices[] = new Vertex($degree);
        }

        return new self($vertices);
    }

    /**
     * @return self
     */
    public function sort(): self
    {
        $sequence = clone $this;
        usort($sequence->vertices, function (Vertex $a, Vertex $b) {
            return $a->getDegree() < $b->getDegree();
        });

        return $sequence;
    }

    /**
     * @return array
     */
    public function head(): array
    {
        $sequence = clone $this;

        $head = array_shift($sequence->vertices);

        return [$head, $sequence];
    }

    /**
     * @return ArrayIterator|Vertex[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->vertices);
    }
}
