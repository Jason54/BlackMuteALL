<?php

namespace BlackTeam\BlackMuteALL; 

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use BlackTeam\BlackMuteALL\commands\GlobalMuteCommand;

class Loader extends PluginBase implements Listener {

	public function onEnable(){
    @mkdir($this->getDataFolder());
    $this->saveResource('config.yml');
    $this->config = new Config($this->getDataFolder().'config.yml', Config::YAML);
    $this->getServer()->getCommandMap()->register("globalmute", new GlobalMuteCommand("globalmute", $this));
    $this->getServer()->getPluginManager()->registerEvents(new MuteListener($this), $this);
     }
  }