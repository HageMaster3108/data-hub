<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\DataHubBundle;

use GraphQL\Error\ClientAware;

class MySafeException extends \Exception implements ClientAware
{
    /**
     * @var string
     */
    protected $category;

    /**
     * MySafeException constructor.
     *
     * @param null $category
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct($category = null, $message = '', $code = 0, \Throwable $previous = null)
    {
        $this->category = $category;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return bool
     */
    public function isClientSafe()
    {
        return true;
    }

    /**
     * @return null|string
     */
    public function getCategory()
    {
        return $this->category ? $this->category : 'datahub';
    }
}
