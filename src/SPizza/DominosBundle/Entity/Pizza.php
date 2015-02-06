<?php

namespace SPizza\DominosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SPizza\DominosBundle\Entity\Product as Product;

/**
 * Pizza
 *
 * @ORM\Table(name="pizzas")
 * @ORM\Entity
 */
class Pizza extends Product
{
    /**
     * @var array
     *
     * @ORM\Column(name="ingredients", type="array", nullable=true)
     */
    private $ingredients;

    /**
     * @var array
     *
     * @ORM\Column(name="nutrition", type="array", nullable=true)
     */
    private $nutrition;

    /**
     * @var array
     *
     * @ORM\Column(name="allergens", type="array", nullable=true)
     */
    private $allergens;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ingredients
     *
     * @param array $ingredients
     * @return Pizza
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    /**
     * Get ingredients
     *
     * @return array 
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set nutrition
     *
     * @param array $nutrition
     * @return Pizza
     */
    public function setNutrition($nutrition)
    {
        $this->nutrition = $nutrition;

        return $this;
    }

    /**
     * Get nutrition
     *
     * @return array 
     */
    public function getNutrition()
    {
        return $this->nutrition;
    }

    /**
     * Set allergens
     *
     * @param array $allergens
     * @return Pizza
     */
    public function setAllergens($allergens)
    {
        $this->allergens = $allergens;

        return $this;
    }

    /**
     * Get allergens
     *
     * @return array 
     */
    public function getAllergens()
    {
        return $this->allergens;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Pizza
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }
}
