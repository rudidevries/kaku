<?php

namespace Kaku\Command;

use Kaku\Channel;

/**
 * Interface for sending 'Klik aan Klik uit' commands.
 *
 * Interface CommandInterface
 * @package Kaku\Command
 * @author Rudi de Vries <rudidevries@gmail.com>
 */
interface CommandInterface
{
    /**
     * Send On signal to the channel
     *
     * @param Channel $channel
     * @return mixed
     */
    public function sendOn(Channel $channel);

    /**
     * Send Off signal to the channel
     *
     * @param Channel $channel
     * @return mixed
     */
    public function sendOff(Channel $channel);
}
