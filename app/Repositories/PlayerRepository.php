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
        return Player::findOrFail($id);
    }

    public function create(array $data)
    {
        $player = new Player($data);
        $player->save();

        return $player;
    }

    public function update($id, array $data)
    {
        $player = Player::findOrFail($id);
        $player->fill($data);
        $player->save();

        return $player;
    }

    public function delete($id)
    {
        $player = Player::findOrFail($id);
        if (!$player) {
            return false;
        }
        $player->delete();
    }
}
