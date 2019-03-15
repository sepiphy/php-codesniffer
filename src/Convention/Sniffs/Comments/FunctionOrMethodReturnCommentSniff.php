<?php

namespace XuanQuynh\CodeSniffer\Convention\Sniffs\Comments;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class FunctionOrMethodReturnCommentSniff implements Sniff
{
    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array
     */
    public function register()
    {
        return [
            T_DOC_COMMENT_TAG,
            T_DOC_COMMENT_STRING,
        ];
    }


    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param  \PHP_CodeSniffer\Files\File  $phpcsFile  The current file being checked.
     * @param  int                          $stackPtr   The position of the current token in the stack passed in $tokens.
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr]['code'] === T_DOC_COMMENT_TAG) {
            if (strpos($tokens[$stackPtr]['content'], '@return') === 0) {
                if ($tokens[$stackPtr]['content'] === '@return') {
                    $spaces = $tokens[$stackPtr + 1]['content'];

                    if (strlen($spaces) !== 1) {
                        $error = 'The notation "@return" must be followed by exact 1 space. Found '.strlen($spaces).' space(s).';
                        $phpcsFile->addError($error, $stackPtr, 'FunctionOrMethodReturnComment');
                    }
                } else {
                    $error = 'The notation "@return" must be followed by exact 1 space. Found 0 space.';
                    $phpcsFile->addError($error, $stackPtr, 'FunctionOrMethodReturnComment');
                }
            }
        }
    }
}
