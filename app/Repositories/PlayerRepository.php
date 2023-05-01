<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Player;

/**
 * Summary of PlayerRepository
 */
class PlayerRepository implements RepositoryInterface
{
    public function getAll()
    {
        return Player::all();
    }

    public function getOne($id)
    {
        $player =  Player::find($id);
        if ($player) {
            return $player;
        }
        return false;
    }

    public function create(array $data)
    {
        $player = new Player($data);
        $player->save();

        return $player;
    }

    public function update($id, array $data)
    {
        $player =  Player::find($id);
        if ($player) {
            $player->fill($data);
            $player->save();
            return $player;
        }
        return false;
    }

    public function delete($id)
    {
        $player =  Player::find($id);
        if ($player) {
            $player->delete();
        } else {
            return false;
        }
    }
}
