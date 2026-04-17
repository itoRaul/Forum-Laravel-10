<?php

namespace App\Repositories;

use App\Repositories\ForumRepositoryInterface;
use App\DTO\Forums\CreateForumDTO;
use App\DTO\Forums\UpdateForumDTO;
use stdClass;
use App\Models\Forum;
use App\Repositories\PaginationInterface;
use App\Repositories\PaginationPresenter;

class ForumEloquentORM implements ForumRepositoryInterface
{

    public function __construct(

        protected Forum $model
    ) {}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {

        $result =  $this->model->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('subject', $filter);
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        })
            ->paginate($totalPerPage, ['*'], 'page', $page);
        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {

        return $this->model->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('subject', $filter);
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        })
            ->get()
            ->toArray();
    }

    public function getById(string $id): stdClass | null
    {

        $forum = $this->model->with(['answers.user'])->find($id);
        if (!$forum) {
            return null;
        }
        return (object) $forum->toArray();
    }

    public function delete(string $id): void
    {

        $this->model->findOrFail($id)->delete();
    }

    public function create(CreateForumDTO $dto): stdClass
    {

        $forum = $this->model->create((array) $dto);

        return (object) $forum->toArray();
    }

    public function update(UpdateForumDTO $dto): stdClass | null
    {

        if (!$forum = $this->model->find($dto->id)) {
            return null;
        }

        $forum->update((array) $dto);
        return (object) $forum->toArray();
    }

    public function getStats(): stdClass
    {
        return (object) [
            'total' => $this->model->count(),
            'active' => $this->model->where('status', 'A')->count(),
            'responses' => $this->model->answers()->count(),
        ];
    }

    public function answer(string $id, string $answer): void
    {
        $forum = $this->model->find($id);
        if ($forum && auth()->check()) {
            $forum->answers()->create([
                'body' => $answer,
                'user_id' => auth()->user()->id
            ]);
        }
    }
}
