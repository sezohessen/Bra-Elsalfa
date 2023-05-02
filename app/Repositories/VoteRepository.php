<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\GameVote as Vote;
use Illuminate\Database\Eloquent\Collection;

class VoteRepository implements RepositoryInterface
{
    public function getAll(): Collection
    {
        return Vote::all();
    }

    public function getOne($id): ?Vote
    {
        return Vote::find($id);
    }

    public function create(array $data): Vote
    {
        $vote = new Vote($data);
        $vote->save();

        return $vote;
    }

    public function update($id, array $data): bool
    {
        $vote = Vote::find($id);
        if (!$vote) {
            return false;
        }

        return $vote->update($data);
    }

    public function delete($id): bool
    {
        $vote = Vote::find($id);
        if (!$vote) {
            return false;
        }

        return $vote->delete();
    }
}
