<?php

  namespace UserGeo;

  use pocketmine\plugin\PluginBase; 
  use pocketmine\event\Listener;
  use pocketmine\command\Command;
  use pocketmine\command\CommandSender;

  class Main extends PluginBase implements Listener {

    public function onEnable() {

      $this->getServer()->getPluginManager()->registerEvents($this, $this);

    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {

      if(strtolower($cmd->getName()) === "usergeo") {

        if(!(isset($args[0]) and isset($args[1]))) {

          $sender->sendMessage(TF::RED . "Error: not enough args. Usage: /usergeo <player> < 
