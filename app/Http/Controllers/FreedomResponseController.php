<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFreedomResponseRequest;
use App\Http\Requests\UpdateFreedomResponseRequest;
use App\Repositories\FreedomResponseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FreedomResponseController extends AppBaseController
{
    /** @var FreedomResponseRepository $freedomResponseRepository*/
    private $freedomResponseRepository;

    public function __construct(FreedomResponseRepository $freedomResponseRepo)
    {
        $this->freedomResponseRepository = $freedomResponseRepo;
    }

    /**
     * Display a listing of the FreedomResponse.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $freedomResponses = $this->freedomResponseRepository->all();

        return view('freedom_responses.index')
            ->with('freedomResponses', $freedomResponses);
    }

    /**
     * Show the form for creating a new FreedomResponse.
     *
     * @return Response
     */
    public function create()
    {
        return view('freedom_responses.create');
    }

    /**
     * Store a newly created FreedomResponse in storage.
     *
     * @param CreateFreedomResponseRequest $request
     *
     * @return Response
     */
    public function store(CreateFreedomResponseRequest $request)
    {
        $input = $request->all();

        $freedomResponse = $this->freedomResponseRepository->create($input);

        Flash::success('Freedom Response saved successfully.');

        return redirect(route('freedomResponses.index'));
    }

    /**
     * Display the specified FreedomResponse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $freedomResponse = $this->freedomResponseRepository->find($id);

        if (empty($freedomResponse)) {
            Flash::error('Freedom Response not found');

            return redirect(route('freedomResponses.index'));
        }

        return view('freedom_responses.show')->with('freedomResponse', $freedomResponse);
    }

    /**
     * Show the form for editing the specified FreedomResponse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $freedomResponse = $this->freedomResponseRepository->find($id);

        if (empty($freedomResponse)) {
            Flash::error('Freedom Response not found');

            return redirect(route('freedomResponses.index'));
        }

        return view('freedom_responses.edit')->with('freedomResponse', $freedomResponse);
    }

    /**
     * Update the specified FreedomResponse in storage.
     *
     * @param int $id
     * @param UpdateFreedomResponseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFreedomResponseRequest $request)
    {
        $freedomResponse = $this->freedomResponseRepository->find($id);

        if (empty($freedomResponse)) {
            Flash::error('Freedom Response not found');

            return redirect(route('freedomResponses.index'));
        }

        $freedomResponse = $this->freedomResponseRepository->update($request->all(), $id);

        Flash::success('Freedom Response updated successfully.');

        return redirect(route('freedomResponses.index'));
    }

    /**
     * Remove the specified FreedomResponse from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $freedomResponse = $this->freedomResponseRepository->find($id);

        if (empty($freedomResponse)) {
            Flash::error('Freedom Response not found');

            return redirect(route('freedomResponses.index'));
        }

        $this->freedomResponseRepository->delete($id);

        Flash::success('Freedom Response deleted successfully.');

        return redirect(route('freedomResponses.index'));
    }
}
