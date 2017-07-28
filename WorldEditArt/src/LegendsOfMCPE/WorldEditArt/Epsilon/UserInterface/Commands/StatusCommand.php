<?php

/*
 *
 * WorldEditArt-Epsilon
 *
 * Copyright (C) 2017 SOFe
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 */

declare(strict_types=1);

namespace LegendsOfMCPE\WorldEditArt\Epsilon\UserInterface\Commands;

use LegendsOfMCPE\WorldEditArt\Epsilon\Consts;
use LegendsOfMCPE\WorldEditArt\Epsilon\UserInterface\PlayerBuilderSession;
use LegendsOfMCPE\WorldEditArt\Epsilon\WorldEditArt;
use pocketmine\command\CommandSender;

class StatusCommand extends WorldEditArtCommand{
	public function __construct(WorldEditArt $plugin){
		parent::__construct($plugin, "/status", "View information about WorldEditArt and you", "/status", ["/info"], Consts::PERM_STATUS);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		$sender->sendMessage("Using " . $this->getPlugin()->getFullName());
		$sessions = $this->getPlugin()->getSessionsOf($sender);
		/** @noinspection PhpIllegalArrayKeyTypeInspection */
		if(count($sessions) > 0){
			/** @noinspection PhpIllegalArrayKeyTypeInspection */
			$hasStd = isset($sessions[PlayerBuilderSession::SESSION_KEY]);
			if($hasStd and count($sessions) === 1){
				$sender->sendMessage("You have started a builder session.");
			}elseif($hasStd){
				$sender->sendMessage("You have started a normal builder session and " . (count($sessions) - 1) . " minion sessions");
			}else{
				$sender->sendMessage("You have started " . count($sessions) . " minion sessions");
			}
		}elseif($sender->hasPermission(Consts::PERM_SESSION_START)){
			$sender->sendMessage("You have not started a builder session. Use `//session start` to start one to use WorldEditArt.");
		}
	}
}
