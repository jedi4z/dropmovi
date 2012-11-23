<?php 

namespace Dropmovi\FrontendBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Dropmovi\FrontendBundle\Entity\Tag;

class TagToStringTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (tag) to a string (name).
     *
     * @param  tag|null $tag
     * @return string
     */
    public function transform($tag)
    {
        if (null === $tag) {
            return "";
        }

        return $tag->getName();
    }

    /**
     * Transforms a string (name) to an object (tag).
     *
     * @param  string $name
     * @return tag|null
     * @throws TransformationFailedException if object (tag) is not found.
     */
    public function reverseTransform($name)
    {
        if (!$name) {
            return null;
        }

        $tag = $this->om
            ->getRepository('DropmoviFrontendBundle:Tag')
            ->findOneBy(array('name' => $name))
        ;

        if (null === $tag) {
            throw new TransformationFailedException(sprintf(
                'An tag with name "%s" does not exist!',
                $name
            ));
        }

        return $tag;
    }
}


?>