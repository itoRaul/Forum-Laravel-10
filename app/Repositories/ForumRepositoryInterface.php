<?php

namespace App\Repositories;

use App\DTO\Forums\CreateForumDTO;
use App\DTO\Forums\UpdateForumDTO;
use stdClass;

interface ForumRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function getById(string $id): stdClass | null;
    public function delete(string $id): void;
    public function create(CreateForumDTO $dto): stdClass;
    public function update(UpdateForumDTO $dto): stdClass | null;
    public function getStats(): stdClass;
    public function answer(string $id, string $answer): void;
}
