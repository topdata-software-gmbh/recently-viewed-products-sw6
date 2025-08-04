<?php declare(strict_types=1);

namespace Topdata\TopdataRecentlyViewedProductsSW6\DAL\FieldSerializer;

use TopdataRecentlyViewedProductsSW6\DAL\Field\RecentProductField;
use TopdataRecentlyViewedProductsSW6\Struct\RecentProductCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Exception\InvalidSerializerFieldException;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Field;
use Shopware\Core\Framework\DataAbstractionLayer\FieldSerializer\JsonFieldSerializer;
use Shopware\Core\Framework\DataAbstractionLayer\Write\DataStack\KeyValuePair;
use Shopware\Core\Framework\DataAbstractionLayer\Write\EntityExistence;
use Shopware\Core\Framework\DataAbstractionLayer\Write\WriteParameterBag;
use Shopware\Core\Framework\Util\Json;
use Symfony\Component\Validator\Constraints\Type;

class RecentProductFieldSerializer extends JsonFieldSerializer
{
    public function encode(
        Field $field,
        EntityExistence $existence,
        KeyValuePair $data,
        WriteParameterBag $parameters
    ): \Generator {
        if (!$field instanceof RecentProductField) {
            throw new InvalidSerializerFieldException(RecentProductField::class, $field);
        }

        yield $field->getStorageName() => Json::encode($data->getValue());
    }

    /**
     * {@inheritdoc}
     */
    public function decode(Field $field, $value): RecentProductCollection | null
    {
        if ($value === null) {
            return null;
        }

        $products = \json_decode($value, true);

        return new RecentProductCollection($products);
    }

    protected function getConstraints(Field $field): array
    {
        return [
            new Type('array'),
        ];
    }
}
