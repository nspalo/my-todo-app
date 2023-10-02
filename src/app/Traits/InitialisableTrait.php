<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Str;

trait InitialisableTrait
{
    public function __construct(?array $payload = [])
    {
        $this->populateAttributeValue($payload ?? []);
    }

    private function populateAttributeValue(array $data): void
    {
        if (empty($data) === true) {
            return;
        }

        foreach ($data as $attribute => $value) {
            $this->initialise($attribute, $value);
        }
    }

    private function generateMethodName(string $key): string
    {
        $methodName = Str::replace('_', '', \ucwords($key, '_'));

        return \sprintf('set%s', \ucfirst($methodName));
    }

    private function initialise(string $attribute, mixed $parameterValue): void
    {
        $methodName = $this->generateMethodName($attribute);

        if (\method_exists(self::class, $methodName) === true) {
            $this->{$methodName}($parameterValue);
        }
    }
}
