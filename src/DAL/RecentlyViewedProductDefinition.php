<?php declare(strict_types=1);

namespace Topdata\TopdataRecentlyViewedProductsSW6\DAL;

use TopdataRecentlyViewedProductsSW6\DAL\Field\RecentProductField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;

class RecentlyViewedProductDefinition extends MappingEntityDefinition
{
    public const ENTITY_NAME = 'recently_viewed_product';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return RecentlyViewedProductCollection::class;
    }

    public function getEntityClass(): string
    {
        return RecentlyViewedProductEntity::class;
    }

    public function defaultFields(): array
    {
        return [];
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            (new StringField('token', 'token'))->setFlags(new Required()),
            new RecentProductField('recent_product', 'recentProduct', [], []),
        ]);
    }
}
