<?php

/*
 * WorldEditArt
 *
 * Copyright (C) 2016 LegendsOfMCPE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author LegendsOfMCPE
 */

namespace WorldEditArt\Objects\BlockStream;

use pocketmine\block\Block;

interface BlockStream{
	/**
	 * @return Block|null the next block in the stream, or null if stream has ended
	 */
	public function next();
}
