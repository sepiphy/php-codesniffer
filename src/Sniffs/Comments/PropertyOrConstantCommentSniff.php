<?php

namespace XuanQuynh\CodeSniffer\Sniffs\Comments;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class PropertyOrConstantVarCommentSniff implements Sniff
{
    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array
     */
    public function register()
    {
        return [
            T_CONST,
            T_VARIABLE,
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

        if ($tokens[$stackPtr]['code'] === T_VARIABLE && in_array($tokens[$stackPtr - 2]['code'], [T_PRIVATE, T_PROTECTED, T_PUBLIC], true)) {
            $shouldCheckNotation = true;
        } elseif ($tokens[$stackPtr]['code'] === T_VARIABLE && in_array($tokens[$stackPtr - 4]['code'], [T_PRIVATE, T_PROTECTED, T_PUBLIC], true)) {
            $shouldCheckNotation = true;
        } elseif ($tokens[$stackPtr]['code'] === T_CONST && in_array($tokens[$stackPtr - 2]['code'], [T_PRIVATE, T_PROTECTED, T_PUBLIC], true)) {
            $shouldCheckNotation = true;
        }

        // If the current token is a property or constant.
        if (isset($shouldCheckNotation)) {
            $prevVarOrConstStackPtr = $phpcsFile->findPrevious([T_VARIABLE, T_CONST, T_FUNCTION], $stackPtr - 1);

            if ($prevVarOrConstStackPtr !== false) {
                $varOpenCommentStackPtr = $phpcsFile->findPrevious(T_DOC_COMMENT_OPEN_TAG, $stackPtr - 1, $prevVarOrConstStackPtr);
                $varCloseCommentStackPtr = $phpcsFile->findPrevious(T_DOC_COMMENT_CLOSE_TAG, $stackPtr - 1, $prevVarOrConstStackPtr);
            } else {
                $varOpenCommentStackPtr = $phpcsFile->findPrevious(T_DOC_COMMENT_OPEN_TAG, $stackPtr - 1);
                $varCloseCommentStackPtr = $phpcsFile->findPrevious(T_DOC_COMMENT_CLOSE_TAG, $stackPtr - 1);
            }

            if ($varOpenCommentStackPtr && $varCloseCommentStackPtr) {
                for ($i = $varOpenCommentStackPtr; $i <= $varCloseCommentStackPtr; $i++) {
                    if ($tokens[$i]['code'] === T_DOC_COMMENT_TAG && $tokens[$i]['content'] === '@var' && $tokens[$i + 2]['code'] === T_DOC_COMMENT_STRING) {
                        $hasVar = true;
                        break;
                    } elseif ($tokens[$i]['code'] = T_DOC_COMMENT_STRING && $tokens[$i]['content'] === '{@inheritdoc}') {
                        $hasInheritdoc = true;
                        break;
                    }
                }
            }

            if (! isset($hasVar) && ! isset($hasInheritdoc)) {
                $error = 'A property or constant must have the comment "@var <datatype>" or "@inheritdoc".';
                $phpcsFile->addError($error, $stackPtr, 'PropertyOrConstantComment');
            }
        }
    }
}
