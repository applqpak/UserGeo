<?php

  namespace UserGeo;

  use pocketmine\plugin\PluginBase; 
  use pocketmine\event\Listener;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\Player;
  use pocketmine\command\Command;
  use pocketmine\command\CommandSender;

  class Main extends PluginBase implements Listener {

    public function onEnable() {

      $this->getServer()->getPluginManager()->registerEvents($this, $this);

    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {

      if(strtolower($cmd->getName()) === "usergeo") {

        if(!(isset($args[0]) and isset($args[1]))) {

          $sender->sendMessage(TF::RED . "Error: not enough args. Usage: /usergeo <player> < city | hostname | region | country | carrier >");

          return true;

        } else {

          $geo_selection = $args[1];

          $name = $args[0];

          $player = $this->getServer()->getPlayer($name);

          if($player === null) {

            $sender->sendMessage(TF::RED . "Player " . $name . " could not be found.");

            return true;

          } else {

            $player_display_name = $player->getDisplayName();

            if(strtolower($geo_selection) === "city") {

              
