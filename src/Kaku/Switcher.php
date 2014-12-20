<?php
namespace Kaku;

use Kaku\Command\CommandInterface;

/**
 * Send a on or off signal to a "Klik aan Klik uit" device.
 *
 * Class Switcher
 * @package Kaku
 * @author Rudi de Vries <rudidevries@gmail.com>
 */
class Switcher
{
    /**
     * Abstraction taking care of sending the command
     * to the device.
     *
     * @var CommandInterface
     */
    protected $command;

    /**
     * Constructor
     *
     * @param CommandInterface $command
     */
    public function __construct(CommandInterface $command)
    {
        $this->command = $command;
    }

    /**
     * Send an 'on' signal to the channel
     *
     * @param Channel $channel
     */
    public function sendOn(Channel $channel)
    {
        $this->command->sendOn($channel);
    }

    /**
     * Send an 'off' signal to the channel
     *
     * @param Channel $channel
     */
    public function sendOff(Channel $channel)
    {
        $this->command->sendOff($channel);
    }
}