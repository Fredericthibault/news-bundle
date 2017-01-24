<?php

namespace Viweb\NewsBundle\Entity;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;

/**
 * Category
 */
class Category implements ResourceInterface, TranslatableInterface
{
    use TranslatableTrait {
        __construct as intializeTranslationCollection;
    }

    public function __construct()
    {
        $this->currentLocale = $this->fallbackLocale = 'en';
        $this->intializeTranslationCollection();
    }

    public function __toString()
    {
        return $this->getTranslation()->getTitle();
    }

    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function createTranslation()
    {
        return new CategoryTranslation();
    }

    public function getTitle()
    {
        return $this->getTranslation()->getTitle();

    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $news;


    /**
     * Add news
     *
     * @param \Viweb\NewsBundle\Entity\News $news
     *
     * @return Category
     */
    public function addNews(\Viweb\NewsBundle\Entity\News $news)
    {
        $this->news[] = $news;

        return $this;
    }

    /**
     * Remove news
     *
     * @param \Viweb\NewsBundle\Entity\News $news
     */
    public function removeNews(\Viweb\NewsBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNews()
    {
        return $this->news;
    }
}
