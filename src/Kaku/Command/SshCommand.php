<?php

namespace Kaku\Command;

use Kaku\Channel;
use Ssh\Session;

/**
 * Sending the command over an SSH connection to
 * another device (e.g. Raspberry PI).
 *
 * Class SshCommand
 * @package Kaku\Command
 * @author Rudi de Vries <rudidevries@gmail.com>
 */
class SshCommand implements CommandInterface
{
    /**
     * SSH Session
     *
     * @var Session
     */
    protected $sshSession;

    /**
     * Path to KAKU switch script.
     *
     * @var string
     */
    protected $path;

    /**
     * @param Session $sshSession
     * @param $path string
     */
    public function __construct(Session $sshSession, $path)
    {
        $this->sshSession = $sshSession;
        $this->path = $path;
    }

    /**
     * Execute the command string
     *
     * @param $command string
     */
    protected function execute($command)
    {
        $exec = $this->sshSession->getExec();
        $exec->run($command);
    }

    /**
     * Send on signal to the channel.
     *
     * @param Channel $channel
     */
    public function sendOn(Channel $channel)
    {
        $this->execute($this->path . sprintf(' %s %d %s',
            $channel->getLetter(),
            $channel->getChannel(),
            'on'
        ));
    }

    /**
     * Send off signal to the channel
     *
     * @param Channel $channel
     */
    public function sendOff(Channel $channel)
    {
        $this->execute($this->path . sprintf(' %s %d %s',
            $channel->getLetter(),
            $channel->getChannel(),
            'off'
        ));
    }
}