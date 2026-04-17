<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Forums\CreateForumDTO;
use App\DTO\Forums\UpdateForumDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateForum;
use App\Models\Forum;
use App\Services\ForumService;
use App\Models\Answer;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function __construct(
        protected ForumService $service
    ) {}

    public function index(Request $request)
    {
        $forums = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 10),
            filter: $request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];
        $stats = $this->service->getStats();
        $answers = Answer::count();

        return view('admin/forum/index', compact('forums', 'filters', 'stats', 'answers'));
    }

    public function show(string | int $id)
    {

        if (!$forum = $this->service->getById($id)) {
            return back();
        }

        return view('admin/forum/show', compact('forum'));
    }

    public function create()
    {

        return view('admin/forum/create');
    }

    public function store(StoreUpdateForum $request, Forum $forum)
    {

        $this->service->create(CreateForumDTO::makeFromRequest($request));

        return redirect()->route('forum.index')->with('message', 'Criado com sucesso!');
    }

    public function edit(string $id)
    {

        if (!$forum = $this->service->getById($id)) {
            return back();
        }

        return view('admin/forum/edit', compact('forum'));
    }

    public function update(StoreUpdateForum $request, Forum $forum, string | int $id)
    {

        $forum = $this->service->update(UpdateForumDTO::makeFromRequest($request));

        if (!$forum) {
            return back();
        }

        return redirect()->route('forum.index')->with('message', 'Atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('forum.index')->with('message', 'Deletado com sucesso!');
    }

    public function answer(Request $request, string | int $id)
    {
        $this->service->answer(id: $id, answer: $request->answer);
        return redirect()->route('forum.show', $id)->with('message', 'Resposta enviada com sucesso!');
    }
}
