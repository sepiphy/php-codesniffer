<?php

namespace XuanQuynh\CodeSniffer\Standards\XuanQuynh\Sniffs\Comments;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class FunctionOrMethodOrderedCommentsSniff implements Sniff
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

            if ($openFunctionDocStackPtr && $closeFunctionDocStackPtr) {
                $notations = [];

                for ($i = $openFunctionDocStackPtr + 1; $i < $closeFunctionDocStackPtr - 1; $i++) {
                    if ($tokens[$i]['code'] === T_DOC_COMMENT_TAG && $tokens[$i]['content'] === '@return') {
                        if (isset($notations['@throws'])) {
                            $error = 'The comment "@return <datatype>" must be defined above the comment "@throws <Exception>".';
                            $phpcsFile->addError($error, $i, 'FunctionOrMethodOrderedComments');
                        }

                        $notations['@return'] = true;
                    } elseif ($tokens[$i]['code'] === T_DOC_COMMENT_TAG && $tokens[$i]['content'] === '@param') {
                        if (isset($notations['@return'])) {
                            $error = 'The comment "@param  <datatype>  $varname" must be defined above the comment "@return <datatype>".';
                            $phpcsFile->addError($error, $i, 'FunctionOrMethodOrderedComments');
                        }

                        $notations['@param'] = true;
                    } elseif ($tokens[$i]['code'] === T_DOC_COMMENT_TAG && $tokens[$i]['content'] === '@throws') {
                        $notations['@throws'] = true;
                    }
                }
            }
        }
    }
}
