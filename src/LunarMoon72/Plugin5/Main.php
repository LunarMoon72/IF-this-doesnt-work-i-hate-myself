<?php

namespace LunarMoon72\Plugin5;

use pocketmine\plugin\PluginBase;

use pocketmine\Player;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase {
    
    public function onEnabled() : void {
        $this->getLogger()->info("§bPlugin Enabled");
    }

    public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
        switch($cmd->getName()) {
            case "cmd":
              if($sender instanceof Player) {
                  $this->mainui($sender);
              } else {
                  $this->getLogger()->info("Use this In game");
              }

        }
        return true;
    }

    public function mainui(Player $player) {
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $player, ?int $data = null){
            if($data === null){
                return;
            }
        });
        $form->setTitle("Info");
        $form->setContent("Welcome " . $player->getName() . ". Do /is create to make an island. Do /isui to manage your island in UI! Do /bs to open the bookshop and do /craft to open the craft menu");
        $form->addButton("Back");
        $form->sendToPlayer($player);
    }
}
