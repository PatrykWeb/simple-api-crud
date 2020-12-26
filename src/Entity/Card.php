<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Card
 * @package App\Entity
 * @ORM\Table(name="app_card")
 * @ORM\Entity()
 */

class Card
{

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @var
     * @ORM\Column(name="data_time" type="datatime")
     */
    private $dataTime;
    /**
     * @var string|null
     * @ORM\Column(name="customer, type="string", length=100)
     */
    private $customer;
    /**
     * @var string|null
     * @ORM\OneToOne(targetEntity="Customer")
     */
    /**
     * @var Collection|Product[]
     * @ORM\ManyToMany(targetEntity="Product")
     */
    private $products;

    /**
     * @return mixed
     */
    public function getDataTime()
    {
        return $this->dataTime;
    }

    /**
     * @param mixed $dataTime
     */
    public function setDataTime($dataTime): void
    {
        $this->dataTime = $dataTime;
    }

    /**
     * @return string|null
     */
    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    /**
     * @param string|null $customer
     */
    public function setCustomer(?string $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return Product[]|Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product[]|Collection $products
     */
    public function setProducts($products): void
    {
        $this->products = $products;
    }

}