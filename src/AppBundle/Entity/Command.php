<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use SPizza\DominosBundle\Entity\Product;
use SPizza\UserBundle\Entity\User;

/**
 * Command
 *
 * @ORM\Table(name="commands")
 * @ORM\Entity
 */
class Command
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var User
     *
     * @ManyToOne(targetEntity="SPizza\UserBundle\Entity\User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var Session
     *
     * @ManyToOne(targetEntity="AppBundle\Entity\Session", inversedBy="commands")
     * @JoinColumn(name="session_id", referencedColumnName="id")
     */
    private $session;

    /**
     * @var Product[]
     *
     * @ManyToOne(targetEntity="SPizza\DominosBundle\Entity\Product")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $products;


    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

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
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param Session $session
     * @return $this
     */
    public function setSession(Session $session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param Product[] $products
     */
    public function setProducts(array $products)
    {
        $this->products = $products;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}
