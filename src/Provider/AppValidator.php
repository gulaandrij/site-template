<?php

namespace App\Provider;

use App\Exception\ApiValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class AppValidator
 *
 * @package App\AppBundle\Provider
 */
class AppValidator
{

    /**
     *
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * Constructor.
     *
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Validate App requests
     *
     * @param mixed           $validateBody
     * @param Collection|null $validateRules
     * @param array|null      $groups
     */
    public function validate($validateBody, ?Collection $validateRules = null, ?array $groups = null): void
    {

        $violations = $this->validator->validate($validateBody, $validateRules, $groups);
        if (\count($violations)) {
            throw new ApiValidationException(Response::HTTP_BAD_REQUEST, $violations);
        }
    }
}
