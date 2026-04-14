<?php

namespace App\Services;

use App\DTO\Forums\CreateForumDTO;
use App\DTO\Forums\UpdateForumDTO;
use App\Repositories\ForumRepositoryInterface;
use stdClass;

class ForumService{
    
    public function __construct(
        
        protected ForumRepositoryInterface $repository,
    ){}

    public function getAll(string $filter = null): array{
    
        return $this->repository->getAll($filter);
    }

    public function getById(string $id): stdClass | null{
        return $this->repository->getById($id);
    }

    public function create(CreateForumDTO $dto): stdClass{
        return $this->repository->create($dto);
    }

    public function update(UpdateForumDTO $dto): stdClass | null{
        return $this->repository->update($dto);
    }

    public function delete(string $id): void{
        $this->repository->delete($id);
    }

     public function paginate(string $filter = null, int $page = 1, int $totalPerPage = 15){
    
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );
    }

    public function getStats(): stdClass
    {
        return $this->repository->getStats();
    }
}