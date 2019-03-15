<?php

namespace XuanQuynh\CodeSniffer\Convention\Sniffs\Comments;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class FunctionOrMethodParamCommentSniff implements Sniff
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
            if (strpos($tokens[$stackPtr]['content'], '@param') === 0) {
                if ($tokens[$stackPtr]['content'] === '@param') {
                    $spaces = $tokens[$stackPtr + 1]['content'];

                    if (strlen($spaces) !== 2) {
                        $error = 'The notation "@param" must be followed by exact 2 spaces. Found '.strlen($spaces).' space(s).';
                        $phpcsFile->addError($error, $stackPtr, 'FunctionOrMethodParamComment');
                    }
                } else {
                    $error = 'The notation "@param" must be followed by exact 2 spaces. Found 0 space.';
                    $phpcsFile->addError($error, $stackPtr, 'FunctionOrMethodParamComment');
                }
            }
        } elseif ($tokens[$stackPtr]['code'] === T_DOC_COMMENT_STRING) {
            if (strpos($tokens[$stackPtr - 2]['content'], '@param') === 0) {
                $segments = explode('  ', $tokens[$stackPtr]['content']);
                $spacesPos = strpos($tokens[$stackPtr]['content'], ' ');
                $dollarPos = strpos($tokens[$stackPtr]['content'], '$');

                if ($spacesPos === false) {
                    $error = 'The comment "@param  <datatype>" must be followed by exact 2 spaces. Found 0 space.';
                    $phpcsFile->addError($error, $stackPtr, 'FunctionOrMethodParamComment');
                } elseif ($dollarPos < $spacesPos) {
                    $error = 'The "<datatype>" follows "@param" notation must not contain "$" character.';
                    $phpcsFile->addError($error, $stackPtr, 'FunctionOrMethodParamComment');
                } elseif (($count = $dollarPos - $spacesPos) !== 2) {
                    $error = 'The comment "@param  <datatype>" must be followed by exact 2 spaces. Found '.$count.' space(s).';
                    $phpcsFile->addError($error, $stackPtr, 'FunctionOrMethodParamComment');
                }
            }
        }
    }
}
