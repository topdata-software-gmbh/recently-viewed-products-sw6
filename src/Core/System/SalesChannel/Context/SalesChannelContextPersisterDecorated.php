<?php declare(strict_types=1);

namespace Topdata\TopdataRecentlyViewedProductsSW6\Core\System\SalesChannel\Context;

use Doctrine\DBAL\Connection;
use Shopware\Core\Checkout\Cart\CartPersister;
use Shopware\Core\System\SalesChannel\Context\SalesChannelContextPersister;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * This class extends the SalesChannelContextPersister to add functionality
 * for handling recently viewed products in the sales channel context.
 */
class SalesChannelContextPersisterDecorated extends SalesChannelContextPersister
{
    private readonly SalesChannelContextPersister $decorated;

    private readonly Connection $connection;

    public function __construct(
        SalesChannelContextPersister $decorated,
        Connection                   $connection,
        EventDispatcherInterface     $eventDispatcher,
        CartPersister                $cartPersister,
        ?string                      $lifetimeInterval = 'P1D'
    )
    {
        $this->decorated = $decorated;
        $this->connection = $connection;

        parent::__construct($connection, $eventDispatcher, $cartPersister, $lifetimeInterval);
    }

    /**
     * Replaces an old token with a new token in the sales channel context
     * and updates the recently viewed products table accordingly.
     *
     * @param string $oldToken The old token to be replaced.
     * @param SalesChannelContext $context The new sales channel context.
     *
     * @return string The new token.
     */
    public function replace(string $oldToken, SalesChannelContext $context): string
    {
        $newToken = $this->decorated->replace($oldToken, $context);

        $this->connection->executeStatement(
            'UPDATE `recently_viewed_product`
                   SET `token` = :newToken
                   WHERE `token` = :oldToken',
            [
                'newToken' => $newToken,
                'oldToken' => $oldToken,
            ]
        );

        return $newToken;
    }

    /**
     * Deletes a token from the sales channel context
     * and removes the corresponding entries from the recently viewed products table.
     *
     * @param string $token The token to be deleted.
     * @param string|null $salesChannelId The ID of the sales channel.
     * @param string|null $customerId The ID of the customer.
     */
    public function delete(string $token, ?string $salesChannelId = null, ?string $customerId = null): void
    {
        $this->decorated->delete($token, $salesChannelId, $customerId);

        $this->connection->executeStatement(
            'DELETE FROM recently_viewed_product WHERE token = :token',
            [
                'token' => $token,
            ]
        );
    }
}
