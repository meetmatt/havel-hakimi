<?php

namespace MeetMatt\HavelHakimi;

use InvalidArgumentException;
use LogicException;

final class Vertex
{
    /**
     * @var int
     */
    private $degree;

    /**
     * @var Edge[]
     */
    private $edges;

    /**
     * @param int $degree
     *
     * @throws InvalidArgumentException
     */
    public function __construct(int $degree)
    {
        if ($degree < 0) {
            throw new InvalidArgumentException('Vertex degree must be greater or equal to zero');
        }

        $this->degree = $degree;
        $this->edges = [];
    }

    /**
     * @return int
     */
    public function getDegree(): int
    {
        return $this->degree;
    }

    /**
     * @return bool
     */
    public function isDepleted(): bool
    {
        return $this->degree === 0;
    }

    /**
     * @param self $vertex
     *
     * @return bool
     */
    public function isConnected(self $vertex): bool
    {
        foreach ($this->edges as $edge) {
            if (
                $edge->getFrom() === $this && $edge->getTo() === $vertex
                ||
                $edge->getFrom() === $vertex && $edge->getTo() === $this
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Vertex $to
     *
     *
     * @throws LogicException
     * @return Edge
     */
    public function connect(self $to): Edge
    {
        if ($this->isConnected($to)) {
            throw new LogicException('Vertices are already connected');
        }
        if ($this->isDepleted()) {
            throw new LogicException('Source vertex is depleted');
        }
        if ($this->isDepleted()) {
            throw new LogicException('Destination vertex is depleted');
        }

        $edge = new Edge($this, $to);
        $this->edges[] = $edge;
        $to->edges[] = $edge;
        $this->degree--;
        $to->degree--;

        return $edge;
    }
}
