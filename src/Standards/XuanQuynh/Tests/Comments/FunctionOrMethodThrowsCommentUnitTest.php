<?php declare(strict_types=1);

/*
 * This file is part of the xuanquynh/php-codesniffer package.
 *
 * (c) Quynh Xuan Nguyen <seriquynh@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace XuanQuynh\CodeSniffer\Standards\XuanQuynh\Tests\Comments;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class FunctionOrMethodThrowsCommentUnitTest extends AbstractSniffUnitTest
{
    /**
     * Returns the lines where errors should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of errors that should occur on that line.
     *
     * @return array<int, int>
     */
    public function getErrorList()
    {
        return [
            4 => 1,
            12 => 1,
            28 => 1,
        ];
    }//end getErrorList()

    /**
     * Returns the lines where warnings should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of warnings that should occur on that line.
     *
     * @return array<int, int>
     */
    public function getWarningList()
    {
        return [
            //
        ];
    }//end getWarningList()
}//end class
