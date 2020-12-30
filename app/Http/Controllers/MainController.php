<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMainRequest;
use App\Http\Requests\UpdateMainRequest;
use App\Models\Main;
use App\Repositories\MainRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Response;

class MainController extends AppBaseController
{
    /** @var  MainRepository */
    private $mainRepository;

    public function __construct(MainRepository $mainRepo)
    {
        $this->mainRepository = $mainRepo;
    }

    /**
     * Display a listing of the Main.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mains = $this->mainRepository->all();

        return view('mains.index')
            ->with('mains', $mains);
    }

    /**
     * Show the form for creating a new Main.
     *
     * @return Response
     */
    public function create()
    {
        return view('mains.create');
    }

    /**
     * Store a newly created Main in storage.
     *
     * @param CreateMainRequest $request
     *
     * @return Response
     */
    public function store(CreateMainRequest $request)
    {
        (new Main())->add($request);

        Flash::success('Main saved successfully.');

        return redirect(route('mains.index'));
    }

    /**
     * Display the specified Main.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $main = $this->mainRepository->find($id);

        if (empty($main)) {
            Flash::error('Main not found');

            return redirect(route('mains.index'));
        }

        return view('mains.show')->with('main', $main);
    }

    /**
     * Show the form for editing the specified Main.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $main = $this->mainRepository->find($id);

        if (empty($main)) {
            Flash::error('Main not found');

            return redirect(route('mains.index'));
        }

        return view('mains.edit')->with('main', $main);
    }

    /**
     * Update the specified Main in storage.
     *
     * @param int $id
     * @param UpdateMainRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMainRequest $request)
    {
        $main = $this->mainRepository->find($id);

        if (empty($main)) {
            Flash::error('Main not found');

            return redirect(route('mains.index'));
        }

        (new Main())->updateInfo($main, $request);

        Flash::success('Main updated successfully.');

        return redirect(route('mains.index'));
    }

    /**
     * Remove the specified Main from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $main = $this->mainRepository->find($id);

        if (empty($main)) {
            Flash::error('Main not found');

            return redirect(route('mains.index'));
        }

        $this->mainRepository->delete($id);
        Storage::disk('local')->delete($main->img);
        Flash::success('Main deleted successfully.');

        return redirect(route('mains.index'));
    }
}
