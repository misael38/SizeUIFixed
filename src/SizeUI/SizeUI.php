<?php
namespace SizeUI;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use jojoe77777\FormAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
class SizeUI extends PluginBase implements Listener{
          public function onEnable(): void{
            $this->getServer()->getPluginManager()->registerEvents(($this), $this);
            $this->getLogger()->info("SizeUI By FazeHampton Enabled");
         }
            
            public function onDisable(): void{
              $this->getServer()->getPluginManager()->registerEvents(($this, $this);
              $this->getLogger()->info("SizeUI By FazeHampton Disabled");
           }
              
              public function checkDepends(): void{
                $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
                if(is_null($this->formapi)){
                  $this->getLogger()->error("SizeUI Needs FormAPI To Work");
                  $this->getPluginLoader()->disablePlugin($this);
               }
            }
            
            public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
              if($cmd->getName() == "size"){
                if(!($sender instanceof Player)){
                  $sender->addTitle("SizeUI"), false);
                  return true;
               }
               $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
               $form = $api->createSimpleForm(function (Player $sender, $data){
                 $result = $data;
                 if ($result == null){
                   }
                   switch ($result){
                     case 0:
                         $sender->addTitle("Size Updated)";
                         $player->setScale("0");
                         break;
                     case 1:
                         $sender->addTitle("Size Updated)";
                         $player->setScale("1");
                         break;
                     case 2:
                         $sender->addTitle("Size Updated)";
                         $player->setScale("2");
                         break;
                     case 3:
                         $sender->addTitle("Size Updated");
                         $player->setScale("3");
                         break;
                    case 4:
                        $sender->addTitle("Size Updated");
                        break;
               }
           });
           $form->setTitle("SizeUI");
           $form->setContent("SizeUI");
           $form->addButton("Mini");
           $form->addButton("Normal");
           $form->addButton("Grand");
           $form->addButton("MegaGrand");
           $form->addButton("Exit SizeUI");
           $form->sendToPlayer($sender);
        }
        return true;
    }
}
