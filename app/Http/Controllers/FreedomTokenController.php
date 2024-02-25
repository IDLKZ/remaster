<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFreedomTokenRequest;
use App\Http\Requests\UpdateFreedomTokenRequest;
use App\Repositories\FreedomTokenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FreedomTokenController extends AppBaseController
{
    /** @var FreedomTokenRepository $freedomTokenRepository*/
    private $freedomTokenRepository;

    public function __construct(FreedomTokenRepository $freedomTokenRepo)
    {
        $this->freedomTokenRepository = $freedomTokenRepo;
    }

    /**
     * Display a listing of the FreedomToken.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $freedomTokens = $this->freedomTokenRepository->all();

        return view('freedom_tokens.index')
            ->with('freedomTokens', $freedomTokens);
    }

    /**
     * Show the form for creating a new FreedomToken.
     *
     * @return Response
     */
    public function create()
    {
        return view('freedom_tokens.create');
    }

    /**
     * Store a newly created FreedomToken in storage.
     *
     * @param CreateFreedomTokenRequest $request
     *
     * @return Response
     */
    public function store(CreateFreedomTokenRequest $request)
    {
        $input = $request->all();

        $freedomToken = $this->freedomTokenRepository->create($input);

        Flash::success('Freedom Token saved successfully.');

        return redirect(route('freedomTokens.index'));
    }

    /**
     * Display the specified FreedomToken.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $freedomToken = $this->freedomTokenRepository->find($id);

        if (empty($freedomToken)) {
            Flash::error('Freedom Token not found');

            return redirect(route('freedomTokens.index'));
        }

        return view('freedom_tokens.show')->with('freedomToken', $freedomToken);
    }

    /**
     * Show the form for editing the specified FreedomToken.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $freedomToken = $this->freedomTokenRepository->find($id);

        if (empty($freedomToken)) {
            Flash::error('Freedom Token not found');

            return redirect(route('freedomTokens.index'));
        }

        return view('freedom_tokens.edit')->with('freedomToken', $freedomToken);
    }

    /**
     * Update the specified FreedomToken in storage.
     *
     * @param int $id
     * @param UpdateFreedomTokenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFreedomTokenRequest $request)
    {
        $freedomToken = $this->freedomTokenRepository->find($id);

        if (empty($freedomToken)) {
            Flash::error('Freedom Token not found');

            return redirect(route('freedomTokens.index'));
        }

        $freedomToken = $this->freedomTokenRepository->update($request->all(), $id);

        Flash::success('Freedom Token updated successfully.');

        return redirect(route('freedomTokens.index'));
    }

    /**
     * Remove the specified FreedomToken from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $freedomToken = $this->freedomTokenRepository->find($id);

        if (empty($freedomToken)) {
            Flash::error('Freedom Token not found');

            return redirect(route('freedomTokens.index'));
        }

        $this->freedomTokenRepository->delete($id);

        Flash::success('Freedom Token deleted successfully.');

        return redirect(route('freedomTokens.index'));
    }
}
