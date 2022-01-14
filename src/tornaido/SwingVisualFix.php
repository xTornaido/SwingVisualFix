<?php

namespace tornaido;

use tornaido\PacketListener;
use pocketmine\plugin\PluginBase;

class SwingVisualFix extends PluginBase
{

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new PacketListener($this), $this);
    }
}
