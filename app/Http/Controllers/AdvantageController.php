<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdvantageRequest;
use App\Http\Requests\UpdateAdvantageRequest;
use App\Models\Advantage;
use App\Repositories\AdvantageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdvantageController extends AppBaseController
{
    /** @var AdvantageRepository $advantageRepository*/
    private $advantageRepository;

    public function __construct(AdvantageRepository $advantageRepo)
    {
        $this->advantageRepository = $advantageRepo;
    }

    /**
     * Display a listing of the Advantage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $advantages = $this->advantageRepository->all();

        return view('advantages.index')
            ->with('advantages', $advantages);
    }

    /**
     * Show the form for creating a new Advantage.
     *
     * @return Response
     */
    public function create()
    {
        return view('advantages.create');
    }

    /**
     * Store a newly created Advantage in storage.
     *
     * @param CreateAdvantageRequest $request
     *
     * @return Response
     */
    public function store(CreateAdvantageRequest $request)
    {
        $advantage = Advantage::add($request);

        Flash::success('Advantage saved successfully.');

        return redirect(route('advantages.index'));
    }

    /**
     * Display the specified Advantage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $advantage = $this->advantageRepository->find($id);

        if (empty($advantage)) {
            Flash::error('Advantage not found');

            return redirect(route('advantages.index'));
        }

        return view('advantages.show')->with('advantage', $advantage);
    }

    /**
     * Show the form for editing the specified Advantage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $advantage = $this->advantageRepository->find($id);

        if (empty($advantage)) {
            Flash::error('Advantage not found');

            return redirect(route('advantages.index'));
        }

        return view('advantages.edit')->with('advantage', $advantage);
    }

    /**
     * Update the specified Advantage in storage.
     *
     * @param int $id
     * @param UpdateAdvantageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdvantageRequest $request)
    {
        $advantage = $this->advantageRepository->find($id);

        if (empty($advantage)) {
            Flash::error('Advantage not found');

            return redirect(route('advantages.index'));
        }

        $advantage = Advantage::updateInfo($advantage,$request);

        Flash::success('Advantage updated successfully.');

        return redirect(route('advantages.index'));
    }

    /**
     * Remove the specified Advantage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $advantage = $this->advantageRepository->find($id);

        if (empty($advantage)) {
            Flash::error('Advantage not found');

            return redirect(route('advantages.index'));
        }

        $this->advantageRepository->delete($id);

        Flash::success('Advantage deleted successfully.');

        return redirect(route('advantages.index'));
    }
}
