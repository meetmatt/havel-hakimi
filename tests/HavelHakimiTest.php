<?php

namespace MeetMatt\HavelHakimi\Test;

use InvalidArgumentException;
use LogicException;
use MeetMatt\HavelHakimi\HavelHakimi;
use MeetMatt\HavelHakimi\Sequence;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException as RecursionContextInvalidArgumentException;

class HavelHakimiTest extends TestCase
{
    /**
     * @dataProvider graphicalSequenceDataProvider
     *
     * @param int[] $degrees
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @throws LogicException
     * @throws RecursionContextInvalidArgumentException
     */
    public function testSequenceIsGraphical(array $degrees)
    {
        $havelHakimi = new HavelHakimi();
        $sequence = Sequence::fromDegrees($degrees);
        $this->assertTrue($havelHakimi->isGraphical($sequence));
    }

    /**
     * @dataProvider notGraphicalSequenceDataProvider
     *
     * @param int[] $degrees
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @throws LogicException
     * @throws RecursionContextInvalidArgumentException
     */
    public function testSequenceIsNotGraphical(array $degrees)
    {
        $havelHakimi = new HavelHakimi();
        $sequence = Sequence::fromDegrees($degrees);
        $this->assertFalse($havelHakimi->isGraphical($sequence));
    }

    /**
     * @return array
     */
    public function graphicalSequenceDataProvider()
    {
        return [
            [[0, 0]],
            [[0, 0, 0, 0, 0, 0, 0, 0]],
            [[4, 3, 3, 2, 2]],
            [[5, 5, 5, 5, 5, 5]],
            [[5, 5, 4, 4, 3, 2, 1]],
            [[6, 5, 3, 3, 3, 2, 2]],
            [[5, 4, 4, 4, 3, 2, 2]],
            [[6, 5, 4, 4, 3, 3, 2, 1]],
            [[7, 5, 5, 4, 3, 3, 3, 1, 1]],
            [[8, 6, 4, 4, 3, 2, 2, 1, 1, 1]],
            [[8, 7, 7, 6, 5, 5, 4, 3, 2, 2, 1]],
            [[9, 7, 7, 7, 6, 5, 4, 3, 3, 2, 1]],
            [[8, 8, 7, 7, 6, 5, 5, 5, 4, 3, 3, 1]],
            [[8, 8, 8, 7, 7, 6, 6, 5, 5, 4, 4]],
            [[8, 8, 8, 7, 7, 6, 6, 5, 5, 4, 4, 0]],
            [[8, 8, 8, 7, 7, 6, 6, 5, 5, 4, 4, 0, 0]],
        ];
    }

    /**
     * @return array
     */
    public function notGraphicalSequenceDataProvider()
    {
        return [
            [[]],
            [[1, 0]],
            [[2, 1]],
            [[3, 3, 3]],
        ];
    }
}
