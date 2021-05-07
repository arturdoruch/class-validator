<?php

namespace ArturDoruch\ClassValidator;

/**
 * @author Artur Doruch <arturdoruch@interia.pl>
 */
class ClassValidator
{
    /**
     * @param string $class The fully-qualified name of the class to validate.
     * @param string $expectedParent The fully-qualified name of expected parent class.
     * @param string $classType Any name describing the class being validated, to be used in exception message.
     *
     * @throws \LogicException
     */
    public static function validateSubclassOf(string $class, string $expectedParent, string $classType)
    {
        if (!(new \ReflectionClass($class))->isSubclassOf($expectedParent)) {
            throw new \LogicException(sprintf(
                'The %s class "%s" must extend the "%s" class.', $classType, $class, $expectedParent
            ));
        }
    }

    /**
     * @param string $class The fully-qualified name of the class to validate.
     * @param string $expectedInterface The fully-qualified name of the expected interface.
     * @param string $classType Any name describing the class being validated, to be used in exception message.
     *
     * @throws \LogicException
     */
    public static function validateImplementsInterface(string $class, string $expectedInterface, string $classType)
    {
        if (!(new \ReflectionClass($class))->implementsInterface($expectedInterface)) {
            throw new \LogicException(sprintf(
                'The %s class "%s" must implement the "%s" interface.', $classType, $class, $expectedInterface
            ));
        }
    }
}
