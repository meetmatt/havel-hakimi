<?php

namespace MeetMatt\HavelHakimi;

use LogicException;

final class HavelHakimi
{
    /**
     * @param Sequence $sequence
     *
     * @throws LogicException
     *
     * @return bool
     */
    public function isGraphical(Sequence $sequence): bool
    {
        if (empty($sequence)) {
            // sequence has no elements
            return false;
        }

        // sort sequence in decreasing order
        $sequence = $sequence->sort();

        // take head of sequence
        /**
         * @var Vertex   $head
         * @var Sequence $tail
         */
        list($head, $tail) = $sequence->head();

        if (empty($head) || empty($tail)) {
            // sequence has only one element
            return false;
        }

        // if head's degree is zero then it's depleted, thus return true
        if ($head->isDepleted()) {
            return true;
        }

        // otherwise "connect" head until it's depleted with each other vertex
        foreach ($tail as $vertex) {
            // which is not depleted yet
            if ($vertex->isDepleted()) {
                continue;
            }
            // and which is not connected to it yet
            if ($head->isConnected($vertex)) {
                continue;
            }
            // stop if head has been depleted
            if ($head->isDepleted()) {
                break;
            }

            $head->connect($vertex);
        }

        // if head was depleted then continue recursively
        if ($head->isDepleted()) {
            return $this->isGraphical($sequence);
        }

        // if in the end the head cannot be depleted by connecting to others
        // then the sequence is not graphical
        return false;
    }
}
