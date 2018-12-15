<?php
namespace SizeUI;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use jojoe77777\FormAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\server\ServerCommandEvent;
class Main extends PluginBase implements Listener{
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(($this), $this);
        $this->getLogger()->info("SizeUI Enabled");
    }
    public function onDisable(): void{
        $this->getServer()->getPluginManager()->registerEvents(($this), $this);
        $this->getLogger()->info("SizeUI Disabled");
    }
    public function checkDepends(): void{
        $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->error("SizeUI Requires FormAPI To Work");
            $this->getPluginLoader()->disablePlugin($this);
        }
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
        if($cmd->getName() == "size"){
            if(!($sender instanceof Player)){
                $sender->sendMessage("SizeUI", false);
                return true;
            }
            $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
            $form = $api->createSimpleForm(function (Player $sender, $data){
                $result = $data;
                if ($result == null) {
                }
                switch ($result) {
                    case 0:
                        $sender->sendMessage("SizeUI");
                        $player->$setScale("1");
                        break;
                    case 1:
                        $sender->sendMessage("SizeUI");
                        $player->$setScale("2");
                        break;
                    case 2:
                        $sender->sendMessage("SizeUI");
                        $player->$setScale("3");
                        break;
                    case 3:
                        $sender->sendMessage("SizeUI");
                        $player->$setScale("4");
                        break;
                    case 4:
                        $sender->sendMessage("SizeUI");
                        break;
                }
            });
            $form->setTitle("SizeUI");
            $form->setContent("SizeUI");
            $form->addButton("Mini");
            $form->addButton("Normal");
            $form->addButton("Big");
            $form->addButton("Bigger");
            $form->addButton("Exit");
            $form->sendToPlayer($sender);
        }
        return true;
    }
}
