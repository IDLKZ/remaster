<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFreedomRequestRequest;
use App\Http\Requests\UpdateFreedomRequestRequest;
use App\Repositories\FreedomRequestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FreedomRequestController extends AppBaseController
{
    /** @var FreedomRequestRepository $freedomRequestRepository*/
    private $freedomRequestRepository;

    public function __construct(FreedomRequestRepository $freedomRequestRepo)
    {
        $this->freedomRequestRepository = $freedomRequestRepo;
    }

    /**
     * Display a listing of the FreedomRequest.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $freedomRequests = $this->freedomRequestRepository->orderBy("created_at","DESC")->paginate(30);

        return view('freedom_requests.index')
            ->with('freedomRequests', $freedomRequests);
    }

    /**
     * Show the form for creating a new FreedomRequest.
     *
     * @return Response
     */
    public function create()
    {
        return view('freedom_requests.create');
    }

    /**
     * Store a newly created FreedomRequest in storage.
     *
     * @param CreateFreedomRequestRequest $request
     *
     * @return Response
     */
    public function store(CreateFreedomRequestRequest $request)
    {
        $input = $request->all();

        $freedomRequest = $this->freedomRequestRepository->create($input);

        Flash::success('Freedom Request saved successfully.');

        return redirect(route('freedomRequests.index'));
    }

    /**
     * Display the specified FreedomRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $freedomRequest = $this->freedomRequestRepository->find($id);

        if (empty($freedomRequest)) {
            Flash::error('Freedom Request not found');

            return redirect(route('freedomRequests.index'));
        }

        return view('freedom_requests.show')->with('freedomRequest', $freedomRequest);
    }

    /**
     * Show the form for editing the specified FreedomRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $freedomRequest = $this->freedomRequestRepository->find($id);

        if (empty($freedomRequest)) {
            Flash::error('Freedom Request not found');

            return redirect(route('freedomRequests.index'));
        }

        return view('freedom_requests.edit')->with('freedomRequest', $freedomRequest);
    }

    /**
     * Update the specified FreedomRequest in storage.
     *
     * @param int $id
     * @param UpdateFreedomRequestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFreedomRequestRequest $request)
    {
        $freedomRequest = $this->freedomRequestRepository->find($id);

        if (empty($freedomRequest)) {
            Flash::error('Freedom Request not found');

            return redirect(route('freedomRequests.index'));
        }

        $freedomRequest = $this->freedomRequestRepository->update($request->all(), $id);

        Flash::success('Freedom Request updated successfully.');

        return redirect(route('freedomRequests.index'));
    }

    /**
     * Remove the specified FreedomRequest from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $freedomRequest = $this->freedomRequestRepository->find($id);

        if (empty($freedomRequest)) {
            Flash::error('Freedom Request not found');

            return redirect(route('freedomRequests.index'));
        }

        $this->freedomRequestRepository->delete($id);

        Flash::success('Freedom Request deleted successfully.');

        return redirect(route('freedomRequests.index'));
    }
}
