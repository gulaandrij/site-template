<?php

namespace App\Traits;

use App\Provider\AppValidator;

/**
 * Trait ValidatorTrait.
 */
trait ValidatorTrait
{
    /**
     * @var AppValidator
     */
    private $v;

    /**
     * @param AppValidator $validator
     * @required
     */
    public function setValidator(AppValidator $validator): void
    {
        $this->v = $validator;
    }
}
