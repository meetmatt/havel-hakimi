<?php

namespace MeetMatt\HavelHakimi;

final class Edge
{
    /**
     * @var Vertex
     */
    private $from;

    /**
     * @var Vertex
     */
    private $to;

    /**
     * @param Vertex $from
     * @param Vertex $to
     */
    public function __construct(Vertex $from, Vertex $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return Vertex
     */
    public function getFrom(): Vertex
    {
        return $this->from;
    }

    /**
     * @return Vertex
     */
    public function getTo(): Vertex
    {
        return $this->to;
    }
}
