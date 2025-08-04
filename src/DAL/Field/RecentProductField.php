<?php declare(strict_types=1);

namespace Topdata\TopdataRecentlyViewedProductsSW6\DAL\Field;

use Topdata\TopdataRecentlyViewedProductsSW6\DAL\FieldSerializer\RecentProductFieldSerializer;
use Shopware\Core\Framework\DataAbstractionLayer\Field\JsonField;

class RecentProductField extends JsonField
{
    protected function getSerializerClass(): string
    {
        return RecentProductFieldSerializer::class;
    }
}
