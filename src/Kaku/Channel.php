<?php

namespace Kaku;

/**
 * Channel of a 'Klik aan Klik uit' device.
 *
 * Class Channel
 * @package Kaku
 * @author Rudi de Vries <rudidevries@gmail.com>
 */
class Channel
{
    /**
     * Name of the channel.
     * Use to indicate where the device can be found or
     * what it's controlling.
     *
     * @var string
     */
    protected $name;

    /**
     * Letter of the channel indication.
     *
     * @var string
     */
    protected $letter;

    /**
     * Channel number
     *
     * @var integer
     */
    protected $channel;

    /**
     * Constructor
     *
     * @param $name string
     * @param $letter string
     * @param $channel integer
     */
    public function __construct($name, $letter, $channel)
    {
        $this->name = $name;
        $this->letter = $letter;
        $this->channel = $channel;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * @return integer
     */
    public function getChannel()
    {
        return $this->channel;
    }
}
