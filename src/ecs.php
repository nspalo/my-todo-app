<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    // Coding Standards Set Rules
    $ecsConfig->sets([
        SetList::COMMON,
        SetList::STRICT,
        SetList::CLEAN_CODE,
        SetList::PSR_12
    ]);

    $ecsConfig->skip([
//        // Rule Set Skip from PHP_CS_FIXER
        PhpCsFixer\Fixer\Phpdoc\PhpdocNoEmptyReturnFixer::class,
//        PhpCsFixer\Fixer\Phpdoc\PhpdocTrimFixer::class,
//        PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer::class,
//        PhpCsFixer\Fixer\CastNotation\CastSpacesFixer::class,                                // Always add space after casting
//        PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer::class,
        PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer::class,                               // NO Yoda!!!
//        PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer::class,              // Always add comma at the end
//        PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer::class,
//        PhpCsFixer\Fixer\Phpdoc\NoEmptyPhpdocFixer::class,
//        PhpCsFixer\Fixer\Phpdoc\PhpdocSeparationFixer::class,
        PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer::class,                           // Unnecessary tag checking
//        PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer::class,                             // Always use Single quote over Double
//        PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer::class,
//        PhpCsFixer\Fixer\Whitespace\LineEndingFixer::class,                                  // Skip, Always use LF for line ending
//        PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer::class,                     // No whitespace in blank lines(end)
//        PhpCsFixer\Fixer\Whitespace\SingleBlankLineAtEofFixer::class,                        // Always add a blank line at the eof
//        Symplify\CodingStandard\Fixer\ArrayNotation\ArrayOpenerAndCloserNewlineFixer::class, // Skip for now//
        PhpCsFixer\Fixer\ClassNotation\SingleTraitInsertPerStatementFixer::class,
    ]);

    // Adding Specific rule, Disabled for now
    $ecsConfig->rules([
        PhpCsFixer\Fixer\Basic\EncodingFixer::class,
    ]);

    // B. standalone rule
    $ecsConfig->ruleWithConfiguration(ArraySyntaxFixer::class, [
        'syntax' => 'short',
    ]);
};
