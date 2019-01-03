<?php

namespace XuanQuynh\CodeSniffer\Sniffs\Comments;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class FunctionOrMethodReturnNotationSniff implements Sniff
{
    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array
     */
    public function register()
    {
        return [
            T_FUNCTION,
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
                        $phpcsFile->addError($error, $stackPtr, 'CallableReturnDoc');
                    }
                } else {
                    $error = 'The notation "@return" must be followed by exact 1 space. Found 0 space.';
                    $phpcsFile->addError($error, $stackPtr, 'CallableReturnDoc');
                }
            }

            return;
        }

        if ($tokens[$stackPtr]['code'] === T_FUNCTION) {
            $previousFunctionStackPtr = $phpcsFile->findPrevious(T_FUNCTION, $stackPtr - 1);

            // If the current function doesn't have a previous one.
            if ($previousFunctionStackPtr === false) {
                $openFunctionDocStackPtr = $phpcsFile->findPrevious(T_DOC_COMMENT_OPEN_TAG, $stackPtr + 1);
                $closeFunctionDocStackPtr = $phpcsFile->findPrevious(T_DOC_COMMENT_CLOSE_TAG, $stackPtr + 1);
            } else {
                $openFunctionDocStackPtr = $phpcsFile->findPrevious(T_DOC_COMMENT_OPEN_TAG, $stackPtr + 1, $previousFunctionStackPtr);
                $closeFunctionDocStackPtr = $phpcsFile->findPrevious(T_DOC_COMMENT_CLOSE_TAG, $stackPtr + 1, $previousFunctionStackPtr);
            }

            // Check the current function docblock has the notation "@return".
            if ($openFunctionDocStackPtr && $closeFunctionDocStackPtr) {
                for ($i = $openFunctionDocStackPtr + 1; $i < $closeFunctionDocStackPtr - 1; $i++) {
                    if ($tokens[$i]['code'] === T_DOC_COMMENT_TAG && strpos($tokens[$i]['content'], '@return') === 0) {
                        $hasRerturn = true;
                        break;
                    }
                }
            }

            if (!isset($hasRerturn)) {
                $error = 'A function or method must have the notation "@return".';
                $phpcsFile->addError($error, $stackPtr, 'MethodOrFunctionReturnNotation');
            }
        }
    }
}
