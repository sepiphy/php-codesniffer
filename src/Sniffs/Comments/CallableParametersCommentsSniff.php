<?php

namespace XuanQuynh\CodeSniffer\Sniffs\Comments;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class CallableParametersCommentsSniff implements Sniff
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

        // Check the number of spaces must follow to @param, @return, @throw notations.
        if ($tokens[$stackPtr]['code'] === T_DOC_COMMENT_TAG) {
            if (strpos($tokens[$stackPtr]['content'], '@param') === 0) {
                if ($tokens[$stackPtr]['content'] === '@param') {
                    $spaces = $tokens[$stackPtr + 1]['content'];

                    if (strlen($spaces) !== 2) {
                        $error = '"@param" notation must be followed by exact 2 spaces. Found '.strlen($spaces).' spaces.';
                        $phpcsFile->addError($error, $stackPtr, 'CallableParamDoc');
                    }
                } else {
                    $error = '"@param" notation must be followed by exact 2 spaces. Found 0 space.';
                    $phpcsFile->addError($error, $stackPtr, 'CallableParamDoc');
                }
            }

            if (strpos($tokens[$stackPtr]['content'], '@return') === 0) {
                if ($tokens[$stackPtr]['content'] === '@return') {
                    $spaces = $tokens[$stackPtr + 1]['content'];

                    if (strlen($spaces) !== 1) {
                        $error = '"@return" notation must be followed by 1 space. Found '.strlen($spaces).' spaces.';
                        $phpcsFile->addError($error, $stackPtr, 'CallableReturnDoc');
                    }
                } else {
                    $error = '"@return" notation must be followed by 1 space. Found 0 space.';
                    $phpcsFile->addError($error, $stackPtr, 'CallableReturnDoc');
                }
            }

            if (strpos($tokens[$stackPtr]['content'], '@throws') === 0) {
                if ($tokens[$stackPtr]['content'] === '@throws') {
                    $spaces = $tokens[$stackPtr + 1]['content'];

                    if (strlen($spaces) !== 1) {
                        $error = '"@throws" notation must be followed by 1 space. Found '.strlen($spaces).' spaces.';
                        $phpcsFile->addError($error, $stackPtr, 'CallableThrowsDoc');
                    }
                } else {
                    $error = '"@throws" notation must be followed by 1 space. Found 0 space.';
                    $phpcsFile->addError($error, $stackPtr, 'CallableThrowsDoc');
                }
            }
        }
    }
}
