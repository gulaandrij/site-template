<?php

namespace App\Traits;

use App\Provider\AppValidator;

/**
 * Trait ValidatorTrait
 *
 * @package App\Traits
 */
trait ValidatorTrait
{

    /**
     *
     * @var AppValidator
     */
    private $v;

    /**
     *
     * @param    AppValidator $validator
     * @required
     */
    public function setValidator(AppValidator $validator): void
    {
        $this->v = $validator;
    }
}
