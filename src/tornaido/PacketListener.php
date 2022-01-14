<?php

namespace tornaido;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\mcpe\protocol\AnimatePacket;
use tornaido\SwingVisualFix;

class PacketListener implements Listener
{
	
	public function __construct(Main $plugin)
    {
		$plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
	}

	public function onRecieve(DataPacketReceiveEvent $event)
    {
		$packet = $event->getPacket();

		if($packet instanceof AnimatePacket && $packet->action === AnimatePacket::ACTION_SWING_ARM)
        {
			$event->cancel();
			$player = $event->getOrigin()->getPlayer();
			$player->getServer()->broadcastPackets($player->getViewers(), [$packet]);
		}
	}
}
