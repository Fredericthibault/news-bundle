<?php

namespace Viweb\NewsBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;

/**
 * News
 */
class News implements ResourceInterface, TranslatableInterface
{
    use TranslatableTrait {
        __construct as intializeTranslationCollection;
    }

    public function __construct()
    {
        $this->currentLocale = $this->fallbackLocale = 'en';
        $this->intializeTranslationCollection();
    }

    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var bool
     */
    private $sticky;

    private $photo;

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return News
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return News
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return News
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set sticky
     *
     * @param boolean $sticky
     *
     * @return News
     */
    public function setSticky($sticky)
    {
        $this->sticky = $sticky;

        return $this;
    }

    /**
     * Get sticky
     *
     * @return bool
     */
    public function getSticky()
    {
        return $this->sticky;
    }

    public function createTranslation()
    {
        return new NewsTranslation();
    }

    public function getTitle()
    {
        return $this->getTranslation()->getTitle();
    }

    public function preUpdateCallback()
    {
        $this->updatedAt = new \DateTime();
    }

    public function prePersistCallback()
    {
        $this->createdAt = new \DateTime();
    }
    /**
     * @var \Viweb\NewsBundle\Entity\Category
     */
    private $category;


    /**
     * Set category
     *
     * @param \Viweb\NewsBundle\Entity\Category $category
     *
     * @return News
     */
    public function setCategory(\Viweb\NewsBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Viweb\NewsBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
