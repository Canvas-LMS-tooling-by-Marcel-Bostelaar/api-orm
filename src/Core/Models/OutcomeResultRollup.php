<?php

namespace CanvasApiLibrary\Core\Models;
use CanvasApiLibrary\Core\Models\Generated\OutcomeResultRollupProperties;

class OutcomeResultRollup extends OutcomeResultRollupStub{
    use OutcomeResultRollupProperties;
    protected static array $properties = [
    ];
    protected static array $nullableProperties = [
        ["float", "score"],
    ];

    public static array $plurals = ["OutcomeResultRollups"];
    protected function getClassName(): string{
        return $this::class;
    }
}
