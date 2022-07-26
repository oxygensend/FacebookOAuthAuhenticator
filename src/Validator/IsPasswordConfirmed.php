<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"CLASS"}) */


#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::IS_REPEATABLE)]
class IsPasswordConfirmed extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'The password fields must match.';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
