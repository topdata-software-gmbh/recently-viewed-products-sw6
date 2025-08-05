<?php declare(strict_types=1);

namespace Topdata\TopdataRecentlyViewedProductsSW6\Core\Content\Product\Cms;

use Topdata\TopdataRecentlyViewedProductsSW6\TopdataRecentlyViewedProductsSW6;
use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;
use Shopware\Core\Content\Cms\DataResolver\CriteriaCollection;
use Shopware\Core\Content\Cms\DataResolver\Element\AbstractCmsElementResolver;
use Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext;
use Shopware\Core\Content\Cms\SalesChannel\Struct\ProductSliderStruct;
use Shopware\Core\Content\Product\ProductCollection;
use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\Uuid\Uuid;

/**
 * Resolves the data for the recently viewed products CMS element.
 * This resolver sets up a product slider structure with a single dummy product,
 * as the actual product data is loaded via AJAX.
 */
class RecentlyViewedProductCmsElementResolver extends AbstractCmsElementResolver
{
    public function getType(): string
    {
        return TopdataRecentlyViewedProductsSW6::RECENTLY_VIEWED_PRODUCT_TYPE;
    }

    /**
     * This collector is just a pseudo collection, the actual data is loaded via AJAX
     */
    public function collect(CmsSlotEntity $slot, ResolverContext $resolverContext): ?CriteriaCollection
    {
        return null;
    }

    /**
     * Enriches the CMS slot with a product slider structure containing a single dummy product.
     * The actual product data is intended to be loaded via AJAX.
     */
    public function enrich(CmsSlotEntity $slot, ResolverContext $resolverContext, ElementDataCollection $result): void
    {
        // ---- Create a new product slider structure
        $slider = new ProductSliderStruct();
        $slot->setData($slider);

        $product = new ProductEntity();
        $product->setUniqueIdentifier(Uuid::randomHex());
        $slider->setProducts(new ProductCollection([$product]));
    }
}
