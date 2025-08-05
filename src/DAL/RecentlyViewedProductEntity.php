<?php declare(strict_types=1);

namespace Topdata\TopdataRecentlyViewedProductsSW6\DAL;

use Topdata\TopdataRecentlyViewedProductsSW6\Struct\RecentProductCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class RecentlyViewedProductEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var RecentProductCollection|null
     */
    protected $recentProduct;

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getRecentProduct(): ?RecentProductCollection
    {
        return $this->recentProduct;
    }

    public function setRecentProduct(?RecentProductCollection $recentProduct): void
    {
        $this->recentProduct = $recentProduct;
    }
}
