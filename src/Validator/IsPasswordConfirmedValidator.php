<?php

namespace App\Validator;

use App\Entity\User;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsPasswordConfirmedValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var App\Validator\IsPasswordConfirmed $constraint */
        /* @var User $value */
        if (null === $value || '' === $value) {
            return;
        }

        if(!$value->getPlainPassword()|| !$value->getConfirmPassword()){
            return;
        }

        if($value->getConfirmPassword() !== $value->getPlainPassword()) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
