<?php
namespace App\Entity;

class Group
{
 
    private string $position;
    private array $players;

    public function __construct(string $position, array $players)
    {
 
        $this->position = $position;
     $this->players = $players;

    }


   

    
    public function getTimePosition(): string
    {
        $result = 0 ;
        $t = $this->position;
        $this->players;
        foreach($this->players as $player){
            if($player->getPosition()==$t) {
            $result = $result + $player->getPlayTime();
            }
        }
        
        return $result;
    }

    public function getPosition(): string
    {
        
        return $this->position;
    }

}


