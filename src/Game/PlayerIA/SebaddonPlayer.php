<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class SebaddonPlayers
 * @package Hackathon\PlayerIA
 * @author Camille
 */
class SebaddonPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {

        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------


      $result = $this->result->getLastChoiceFor($this->opponentSide);
      $mySide = $this->result->getLastChoiceFor($this->mySide);

      if ($result == 0)
        return parent::paperChoice();

      $nb_scissors = $this->result->getStatsFor($this->opponentSide)[1];
      $nb_paper = $this->result->getStatsFor($this->opponentSide)[2];
      $nb_rock = $this->result->getStatsFor($this->opponentSide)[3];
      $round = $this->result->getNbRound();
      $last_score = $this->result->getLastScoreFor($this->mySide);

      if ($last_score == 1)
      {
        if ($result == parent::paperChoice())
          return parent::rockChoice();
        if ($result == parent::rockChoice())
          return parent::scissorsChoice();
        if ($result == parent::scissorsChoice())
          return parent::paperChoice();
      }
      //if (!($scis == $round || $ro == $round || $paper == $round))
      //{
      //  if ($result == $mySide)
      //    return $result;
      //} 

      if ($result == parent::paperChoice())
        return parent::scissorsChoice();
      if ($result == parent::scissorsChoice())
        return parent::rockChoice();
      if ($result == parent::rockChoice())
        return parent::paperChoice();

      return $result;
    }
};
